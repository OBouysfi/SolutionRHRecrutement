<div class="tab-pane fade" id="tabM1120" role="tabpanel" aria-labelledby="tabM1120-tab">
    <div class="row mb-5">
        <div class="col-12">
            <div class="row">
                <div class="col-5 ms-auto mb-5"
                    style="margin-bottom: 36px !important;margin-top: 36px;margin-right: 14px;">
                    <div class="input-group" style="border: 1px solid #005dc7">
                        <span class="input-group-text text-theme">
                            <i class="bi bi-search"></i>
                        </span>
                        <input id="searchInput" type="text" class="form-control translated_text"
                            placeholder="{{ __("generated.Recherche...") }}">
                    </div>
                </div>
                <div id="timelineResults" class="col-12 cover-cusomer" style="padding: 10px 23px">
                    @foreach ($timelines as $timeline)
                        <div class="card border-0 mb-4 timeline-item"
                            data-description="{{ strtolower($timeline->description) }}">
                            <div class="card-body p-0 custom-style">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-60 coverimg vm">
                                            <img id="userAvatarPreview"
                                                src="{{ $timeline->activityLog->user->user_image ? asset('storage/' . $timeline->activityLog->user->user_image) : asset('assets/img/icon/HJ_icon_green_black.png') }}"
                                                alt="User Avatar"  />
                                        </figure>
                                    </div>
                                    <div class="col-11">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="th-action-header th-date ">{{ __("generated.Date") }}</th>
                                                    <th class="th-action-header th-action ">{{ __("generated.Action") }}</th>
                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 13px">
                                                <tr>
                                                    <td style="border-bottom: 0px !important;padding-top: 0;">
                                                        {{ $timeline->created_at->format('d/m/Y') }}</td>
                                                    <td style="border-bottom: 0px !important;padding-top: 0;">
                                                        {{ __($timeline->description) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Message "Aucun résultat trouvé" -->
                    <div id="noResultsMessage" class="text-center mt-4 mb-5" style="display: none;">
                        <p style="color: #87888b; font-size: 16px;" >{{ __("generated.Aucun résultat trouvé.") }}</p>
                    </div>
                    <!-- Pagination -->
                    <div class="row align-items-center mx-0 mb-4">
                        
                        <div class="col-5"></div>
                        <div class="col-7 footable-paging-external footable-paging-right" id="footable-pagination">
                            <div class="footable-pagination-wrapper card-header bg-gradient-theme-light rounded" style="margin-right:-12px;padding: 5px">
                                <ul class="pagination">

                                    {{-- First Page --}}
                                    <li class="footable-page-nav {{ $timelines->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="footable-page-link pagination-link" href="#" data-url="{{ $timelines->url(1) }}">«</a>
                                    </li>

                                    {{-- Previous Page --}}
                                    <li class="footable-page-nav {{ $timelines->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="footable-page-link pagination-link" href="#" data-url="{{ $timelines->previousPageUrl() }}">‹</a>
                                    </li>

                                    @php
                                        $current = $timelines->currentPage();
                                        $last = $timelines->lastPage();
                                        $maxPagesToShow = 5;
                                        $half = floor($maxPagesToShow / 2);

                                        $start = max(1, $current - $half);
                                        $end = min($last, $current + $half);

                                       
                                        if ($current <= $half) {
                                            $start = 1;
                                            $end = min($last, $maxPagesToShow);
                                        }

                                        
                                        if ($current + $half > $last) {
                                            $end = $last;
                                            $start = max(1, $last - $maxPagesToShow + 1);
                                        }
                                    @endphp

                                    @for ($page = $start; $page <= $end; $page++)
                                        <li class="footable-page visible {{ $page == $current ? 'active' : '' }}">
                                            <a class="footable-page-link pagination-link" href="#" data-url="{{ $timelines->url($page) }}">{{ $page }}</a>
                                        </li>
                                    @endfor

                                    {{-- Next Page --}}
                                    <li class="footable-page-nav {{ $timelines->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="footable-page-link pagination-link" href="#" data-url="{{ $timelines->nextPageUrl() }}">›</a>
                                    </li>

                                    {{-- Last Page --}}
                                    <li class="footable-page-nav {{ $timelines->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="footable-page-link pagination-link" href="#" data-url="{{ $timelines->url($last) }}">»</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let debounceTimer;
    document.getElementById('searchInput').addEventListener('input', function() {
        clearTimeout(debounceTimer); // Annule le timer précédent
        debounceTimer = setTimeout(() => {
            const searchTerm = this.value.toLowerCase();
            const timelineItems = document.querySelectorAll('.timeline-item');
            let hasResults = false;

            // Parcourt tous les éléments de timeline
            timelineItems.forEach(item => {
                const description = item.getAttribute('data-description');
                if (description.includes(searchTerm)) {
                    item.style.display = '';
                    hasResults = true;
                } else {
                    item.style.display = 'none';
                }
            });

            // "Aucun résultat trouvé"
            const noResultsMessage = document.getElementById('noResultsMessage');
            if (!hasResults) {
                noResultsMessage.style.display = '';
            } else {
                noResultsMessage.style.display = 'none';
            }
        }, 300);
    });
</script>

<script>
$(document).on('click', '.pagination-link', function(e) {
    e.preventDefault();

    let url = $(this).data('url');
    if (!url) return;

    $.ajax({
        url: url,
        type: 'GET',
        success: function(response) {
            const newContent = $(response).find('#timelineResults').html();
            $('#timelineResults').html(newContent);
        },
        error: function(xhr) {
            alert("Une erreur est survenue lors du chargement.");
        }
    });
});
</script>
