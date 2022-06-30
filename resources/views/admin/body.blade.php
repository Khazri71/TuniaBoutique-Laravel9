
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Produits totaux</p>
                                <h6 class="mb-0">{{$total_product}}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Commandes totaux</p>
                                <h6 class="mb-0">{{$total_order}}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Commandes Livrées</p>
                                <h6 class="mb-0">{{ $total_order_delivred }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Commande En Traitement</p>
                                <h6 class="mb-0">{{$total_order_processing }}</h6>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2"> Prix revenu maintenant</p>
                                <h6 class="mb-0">{{$revenue_now}} DT</h6>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2"> Prix revenu aprés</p>
                                <h6 class="mb-0">{{$revenue_after}} DT</h6>
                            </div>
                        </div>
                    </div>
                

                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2"> Revenu Total à atteindre</p>
                                <h6 class="mb-0">{{$total_revenue}} DT</h6>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Nombre Clients Total </p>
                                <h6 class="mb-0">{{$total_customer}}</h6>
                            </div>
                        </div>
                    </div>
                

                </div>
            </div>
            <!-- Sale & Revenue End -->


            


           