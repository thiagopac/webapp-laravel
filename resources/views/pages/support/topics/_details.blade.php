<!--begin::details View-->
<div class="card">
    <!--begin::Card body-->
    <div class="card-body">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-xl-row p-7">
            <!--begin::Content-->
            <div class="flex-lg-row-fluid me-xl-15 mb-20 mb-xl-0">
                <!--begin::Tickets-->
                <div class="mb-0">

                    <!--begin::Heading-->
                    <h1 class="text-dark mb-10">Tópicos de ajuda</h1>
                    <!--end::Heading-->

                    <!--begin::Tickets List-->
                    <div class="mb-10">

                        <!--begin::Ticket-->
                        <div class="d-flex mb-10">

                            <!--begin::Icon-->
                            {!! theme()->getSvgIcon('icons/duotune/general/gen046.svg', "svg-icon-2x pe-3 svg-icon-primary") !!}
                            <!--end::Icon-->

                            <!--begin::Section-->
                            <div class="d-flex flex-column">

                                <!--begin::Content-->
                                <div class="d-flex align-items-center mb-2">

                                    <!--begin::Title-->
                                    <a href="{{ route('topics.topic', "unidades-consumidoras")}}" class="text-dark text-hover-primary fs-4 me-3 fw-bold">O que são Unidades Consumidoras?</a>
                                    <!--end::Title-->


                                </div>
                                <!--end::Content-->

                                <!--begin::Text-->
                                <span class="text-muted fw-bold fs-6">
                                    Número que define uma unidade residencial, comercial, industrial ou pública que consome energia elétrica.
                                    Cada unidade possui um medidor de consumo energético único e individualizado.
                                    O número de uma unidade consumidora geralmente fica localizado no topo da fatura de energia.
                                </span>
                                <!--end::Text-->

                            </div>
                            <!--end::Section-->

                        </div>
                        <!--end::Ticket-->


                    </div>
                    <!--end::Tickets List-->

                    <!--begin::Pagination-->
                    <ul class="pagination">
                        <li class="page-item previous disabled">
                            <a href="#" class="page-link">
                                <i class="previous"></i>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link">3</a>
                        </li>
                        <li class="page-item next">
                            <a href="#" class="page-link">
                                <i class="next"></i>
                            </a>
                        </li>
                    </ul>
                    <!--end::Pagination-->
                </div>
                <!--end::Tickets-->
            </div>
            <!--end::Content-->
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-100 mw-lg-300px mw-xxl-350px">
                <!--begin::More channels-->
                <div class="card-rounded bg-primary bg-opacity-5 p-10 mb-15">
                    <!--begin::Title-->
                    <h2 class="text-dark fw-bolder mb-11">More Channels</h2>
                    <!--end::Title-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-10">
                        <!--begin::Icon-->
                        <i class="bi bi-file-earmark-text text-primary fs-1 me-5"></i>
                        <!--end::SymIconbol-->
                        <!--begin::Info-->
                        <div class="d-flex flex-column">
                            <h5 class="text-gray-800 fw-bolder">Project Briefing</h5>
                            <!--begin::Section-->
                            <div class="fw-bold">
                                <!--begin::Desc-->
                                <span class="text-muted">Check out our</span>
                                <!--end::Desc-->
                                <!--begin::Link-->
                                <a href="#" class="link-primary">Support Policy</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-10">
                        <!--begin::Icon-->
                        <i class="bi bi-chat-square-text-fill text-primary fs-1 me-5"></i>
                        <!--end::SymIconbol-->
                        <!--begin::Info-->
                        <div class="d-flex flex-column">
                            <h5 class="text-gray-800 fw-bolder">More to discuss?</h5>
                            <!--begin::Section-->
                            <div class="fw-bold">
                                <!--begin::Desc-->
                                <span class="text-muted">Email us to</span>
                                <!--end::Desc-->
                                <!--begin::Link-->
                                <a href="#" class="link-primary">support@keenthemes.com</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-10">
                        <!--begin::Icon-->
                        <i class="bi bi-twitter text-primary fs-1 me-5"></i>
                        <!--end::SymIconbol-->
                        <!--begin::Info-->
                        <div class="d-flex flex-column">
                            <h5 class="text-gray-800 fw-bolder">Latest News</h5>
                            <!--begin::Section-->
                            <div class="fw-bold">
                                <!--begin::Desc-->
                                <span class="text-muted">Follow us at</span>
                                <!--end::Desc-->
                                <!--begin::Link-->
                                <a href="#" class="link-primary">KeenThemes Twitter</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center">
                        <!--begin::Icon-->
                        <i class="bi bi-github text-primary fs-1 me-5"></i>
                        <!--end::SymIconbol-->
                        <!--begin::Info-->
                        <div class="d-flex flex-column">
                            <h5 class="text-gray-800 fw-bolder">Github Access</h5>
                            <!--begin::Section-->
                            <div class="fw-bold">
                                <!--begin::Desc-->
                                <span class="text-muted">Our github repo</span>
                                <!--end::Desc-->
                                <!--begin::Link-->
                                <a href="#" class="link-primary">KeenThemes Github</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::More channels-->
                <!--begin::Documentations-->
                <div class="card-rounded bg-primary bg-opacity-5 p-10 mb-15">
                    <!--begin::Title-->
                    <h1 class="fw-bolder text-dark mb-9">Documentation</h1>
                    <!--end::Title-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-2 ms-n1 me-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black"></path>
															</svg>
														</span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Subtitle-->
                        <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-5 m-0">Angular Admin</a>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-2 ms-n1 me-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black"></path>
															</svg>
														</span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Subtitle-->
                        <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-5 m-0">React Admin</a>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-2 ms-n1 me-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black"></path>
															</svg>
														</span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Subtitle-->
                        <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-5 m-0">Vue Dashboard</a>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-2 ms-n1 me-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black"></path>
															</svg>
														</span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Subtitle-->
                        <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-5 m-0">Niche Theme</a>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-2 ms-n1 me-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black"></path>
															</svg>
														</span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Subtitle-->
                        <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-5 m-0">Dashboard Admin</a>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-2 ms-n1 me-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black"></path>
															</svg>
														</span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Subtitle-->
                        <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-5 m-0">Dorsey Front-end</a>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-2 ms-n1 me-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black"></path>
															</svg>
														</span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Subtitle-->
                        <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-5 m-0">CRM Admin</a>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-2 ms-n1 me-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black"></path>
															</svg>
														</span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Subtitle-->
                        <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-5 m-0">Admin Dashbaord</a>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-2 ms-n1 me-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black"></path>
															</svg>
														</span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Subtitle-->
                        <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-5 m-0">Intranet Admin</a>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Documentations-->
            </div>
            <!--end::Sidebar-->
        </div>
        <!--end::Layout-->
    </div>
    <!--end::Card body-->
</div>
<!--end::details View-->
