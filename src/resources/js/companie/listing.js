$(document).ready(function () {
    const locale = document.documentElement.lang || "fr"; // fallback to 'fr'

    // Map locale to DataTables language file
    const dataTablesLangUrl = {
        fr: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json",
        en: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/en-GB.json",
        es: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json",
        zh: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/zh.json",
        pt: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-PT.json",
        ar: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json",
    }[locale] || "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json";

    var table = $('#companiesTable').DataTable({
        processing: false,
        serverSide: true,
        lengthChange: false,
        searching: false,
        paging: false,
        language: {
            url: dataTablesLangUrl,
        },
        ajax: {
            url: companieData, 
            type: "GET",
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('token') 
            },
            data: function (d) {
                console.log("Sent Data:", d); 
            },
            error: function (xhr, error, thrown) {
                console.error("DataTables Ajax Error:", error, thrown);
                console.log(xhr.responseText); 
            }
        },
        columns: [
            { data: 'picture', name: 'picture', orderable: false, searchable: false },
            { data: "business_name", name: "business_name",className: 'text-center',orderable: false, },
            { data: "address", name: "address" ,orderable: false,},
            { data: "postal_code", name: "postal_code",className: 'text-center',orderable: false, },
            { data: "ville", name: "ville",orderable: false, },
            { data: 'action', name: 'action' ,orderable: false,}
        ],
        
        drawCallback: function (settings) {
           
             $('#companiesTable thead th').each(function () {
                    const $th = $(this);

                    // Save and reuse the original title
                    if (!$th.data('original-title')) {
                        const originalTitle = $th.text().trim();
                        $th.data('original-title', originalTitle);
                    }
                    const columnTitle = $th.data('original-title');

                    // Determine the icon
                    // let icon = '⇅';
                    // if ($th.hasClass('sorting_asc')) icon = '▲';
                    // else if ($th.hasClass('sorting_desc')) icon = '▼';

                    let back = 'https://cdn.datatables.net/1.11.5/images/sort_both.png';
                    if ($th.hasClass('sorting_asc')) back = 'https://cdn.datatables.net/1.11.5/images/sort_asc.png';
                    else if ($th.hasClass('sorting_desc')) back = '	https://cdn.datatables.net/1.11.5/images/sort_desc.png';

                    // Inject the new structure
                    if ($th.hasClass("sorting") || $th.hasClass("sorting_asc") || $th.hasClass("sorting_desc")) {
                        $th.css("background-image", "none");
                        $th.html(`
                            <div class="th-wrapper" style="
                                display: inline-flex;
                                align-items: center;
                                gap: 4px;
                                white-space: nowrap;
                                cursor: pointer;
                            ">
                                <span class="th-text">${columnTitle}</span>
                                <span class="sorting-icon" style="height:20px; width:15px; background-image: url(${back}) !important; display:none"></span>
                            </div>
                        `);
                    }
                    // Remove default DataTables sorting classes to kill default icons
                    $th.removeClass('sorting sorting_asc sorting_desc');
                });
        },
       
    });
});

