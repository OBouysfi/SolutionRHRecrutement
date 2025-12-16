    <div class="rightbar-wrap">
        <div class="rightbar">
            <!-- chat window -->
            <div class="chatwindow d-none" id="chatwindow">
                <div class="card border-0 h-100">
                    <div class="input-group input-group-md">
                        <span class="input-group-text text-theme"><i class="bi bi-person-plus"></i></span>
                        <input type="text" class="form-control" placeholder="Recherche..." value="" />
                        <div class="dropdown input-group-text rounded px-0">
                            <button class="btn btn-sm btn-link dd-arrow-none" type="button" id="statuschat" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="statuschat">
                                <li><a class="dropdown-item" href="javascript:void(0)"><span class="vm me-1 bg-success rounded-circle d-inline-block p-1"></span> Online</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)"><span class="vm me-1 bg-warning rounded-circle d-inline-block p-1"></span> Away</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)"><span class="vm me-1 bg-danger rounded-circle d-inline-block p-1"></span> Offline</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)"><span class="vm me-1 bg-secondary rounded-circle d-inline-block p-1"></span> Disabled</a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="card-header">
                        <div class="row">
                            <div class="col d-grid">
                                <button class="btn btn-outline-secondary border" type="button"><i class="bi bi-camera-video me-2"></i> Meet</button>
                            </div>
                            <div class="col d-grid">
                                <button class="btn btn-outline-secondary border" type="button"><i class="bi bi-chat-right-text me-2"></i> Chat</button>
                            </div>
                        </div>
                    </div> --}}
                    <div class="card-body h-100 overflow-y-auto p-0">
                        <ul class="list-group list-group-flush bg-none rounded-0 ">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 coverimg rounded-circle">
                                            <img src="{{ asset("assets/img/user/2.jpeg")}}" alt="" />
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Fatima Zahra El Mansouri</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check"></i> 8:45</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Réunion prévue avec le maire de Marrakech</p>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 rounded-circle bg-theme">
                                            <span class="h6 vm">MB</span>
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Mohammed Berrada</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check-all"></i> 09:20</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Projet de digitalisation des services publics</p>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 coverimg rounded-circle">
                                            <img src="{{ asset("assets/img/user/4.jpeg")}}" alt="" />
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Khadija Rbati</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check-all text-info"></i> 10:10</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Conférence à l'Université Mohammed V</p>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 coverimg rounded-circle">
                                            <img src="{{ asset("assets/img/user/9.jpeg")}}" alt="" />
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Anas Bennis</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check-all text-success"></i> Hier</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Publication du rapport sur les startups</p>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 rounded-circle bg-warning text-white">
                                            <span class="h6 vm">NL</span>
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Nadia Laghzaoui</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check-all"></i>4 jours</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Lancement de la plateforme e-gov.ma</p>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item" data-bs-toggle="modal" data-bs-target="#chatmodalwindow">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 rounded-circle bg-success text-white">
                                            <span class="h6 vm">YO</span>
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Youssef Outmani</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check"></i>1 mois</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Demande de rendez-vous pour un entretien</p>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 coverimg rounded-circle">
                                            <img src="{{ asset("assets/img/user/3.jpeg")}}" alt="" />
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Sara El Khalfi</p>
                                            </div>
                                            <div class="col-4 text-end">
                                                <small class="text-muted fs-10 mb-1"><i class="bi bi-check"></i> 11:30</small>
                                            </div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Dossier validé, en attente de signature</p>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 rounded-circle bg-primary text-white">
                                            <span class="h6 vm">AH</span>
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Ahmed Hadri</p>
                                            </div>
                                            <div class="col-4 text-end">
                                                <small class="text-muted fs-10 mb-1"><i class="bi bi-check-all text-success"></i> Hier</small>
                                            </div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Merci pour la mise à jour sur le projet</p>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 rounded-circle bg-danger text-white">
                                            <span class="h6 vm">OM</span>
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Oumaima Miftah</p>
                                            </div>
                                            <div class="col-4 text-end">
                                                <small class="text-muted fs-10 mb-1"><i class="bi bi-check-all"></i>2 jours</small>
                                            </div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Avez-vous reçu les documents demandés ?</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- chat window ends -->


            <div class="notificationwindow d-none h-100 overflow-y-auto" id="notificationwindow">

                <!-- Notification 1 -->
                <div class="card border-0 mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <figure class="avatar avatar-40 coverimg rounded-circle">
                                    <img src="{{ asset("assets/img/user/11.jpeg")}}" alt="" />
                                </figure>
                            </div>
                            <div class="col ps-0">
                                <p><a href="profile.html">Omar El Hajoui</a>, <a href="profile.html">Sara Messaoudi</a> et <span class="fw-medium">12 autres</span> ont postulé à l’offre <strong>Développeur Web</strong> sur HumanJobs.</p>
                                <p class="text-secondary small">11:20 <a href="javascript:void(0)" class="float-end text-secondary text-muted"><i class="bi bi-trash"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notification 2 -->
                <div class="card border-0 mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <figure class="avatar avatar-40 rounded-circle bg-theme">
                                    <span class="h6 vm">KH</span>
                                </figure>
                            </div>
                            <div class="col ps-0">
                                <p><a href="profile.html">Khalid Hlimi</a> a commenté une offre : "Offre très intéressante, j’aimerais en savoir plus..."</p>
                                <p class="text-secondary small">Il y a 2 jours <a href="javascript:void(0)" class="float-end text-secondary text-muted"><i class="bi bi-trash"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notification 3: Subscription Warning -->
                <div class="alert alert-warning mb-2">
                    <div class="row">
                        <div class="col-auto">
                            <figure class="avatar avatar-40 rounded-circle bg-warning text-white">
                                <i class="bi bi-bell"></i>
                            </figure>
                        </div>
                        <div class="col ps-0">
                            <p>Votre abonnement à <strong>HumanJobs</strong> arrive à expiration. Veuillez <a href="profile-subscription.html">renouveler</a> pour continuer à recevoir des candidatures sans interruption.</p>
                            <p class="text-secondary small">Il y a 4 jours <a href="javascript:void(0)" class="float-end text-secondary text-muted"><i class="bi bi-trash"></i></a></p>
                        </div>
                    </div>
                </div>

                <!-- Notification 4 -->
                <div class="card border-0 mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <figure class="avatar avatar-40 coverimg rounded-circle">
                                    <img src="{{ asset("assets/img/user/10.jpeg")}}" alt="" />
                                </figure>
                            </div>
                            <div class="col ps-0">
                                <p><a href="interview-requests.html">Nourredine Amrani</a> a demandé la validation de son entretien prévu le <strong>22 juillet</strong>.</p>
                                <p class="text-secondary small">Il y a 4 jours <a href="javascript:void(0)" class="float-end text-secondary text-muted"><i class="bi bi-trash"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notification 5: Event -->
                <div class="card border-0 mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <figure class="avatar avatar-40 rounded-circle bg-light-theme text-white">
                                    <i class="bi bi-calendar-event"></i>
                                </figure>
                            </div>
                            <div class="col ps-0">
                                <p class="h6 fw-medium">Événement RH : Salon HumanJobs</p>
                                <p>Participez au salon du recrutement digital à Casablanca, le 25 juillet 2025.</p>
                                <div class="mb-3">
                                    <figure class="avatar avatar-24 coverimg rounded-circle" data-bs-toggle="tooltip" title="Omar El Hajoui">
                                        <img src="{{ asset("assets/img/user/2.jpeg")}}" alt="" />
                                    </figure>
                                    <figure class="avatar avatar-24 coverimg rounded-circle" data-bs-toggle="tooltip" title="Sara Messaoudi">
                                        <img src="{{ asset("assets/img/user/3.jpeg")}}" alt="" />
                                    </figure>
                                    <div class="avatar avatar-24 bg-light-theme rounded-circle">
                                        <small class="fs-10 vm">9+</small>
                                    </div>
                                    <span class="text-secondary small"> participent</span>
                                </div>
                                <p class="text-secondary small">Il y a 4 jours <a href="javascript:void(0)" class="float-end text-secondary text-muted"><i class="bi bi-trash"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- notifications window ends -->
        </div>
    </div>