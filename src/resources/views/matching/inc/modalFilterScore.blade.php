<div class="modal fade" id="modalFiltres" tabindex="-1" aria-labelledby="modalFiltresLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="modalFiltresLabel">{{ __("generated.Filtres avancés") }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <!-- 🎯 -->
                <div class="rounded border poste-chosen p-3">
                    <label class="mb-2" style="color: #000000;font-size: 12px;"> <span >{{ __("generated.Score de matching") }}</span> (%)</label>

                    <div class="price-graph mb-2">
                        <div class="bar-container" id="bars"></div>
                    </div>

                    <div class="range-slider mb-2">
                        <div class="track"></div>
                        <div class="range" id="range"></div>
                        <input type="range" min="0" max="100" value="0" id="minSlider">
                        <input type="range" min="0" max="100" value="100" id="maxSlider">
                    </div>

                    <div class="price-display">
                        <div class="price-box" id="minPrice">%0</div>
                        <div class="price-box" id="maxPrice">%100+</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal"></button>
                <button type="button" class="btn btn-theme " id="applyFiltersBtn">{{ __("generated.Appliquer") }}</button>
            </div>
        </div>
    </div>
</div>
