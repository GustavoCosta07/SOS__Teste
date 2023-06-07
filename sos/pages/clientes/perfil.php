 <?php 
@session_start();
if(!empty($_SESSION['id'])){
	
}else{
	header("Location: login.php");	
}

$cmd = "select * from alunos where id_aluno ='$id' and cod_cfc ='$user[cod_cfc]'   ";
$alunos = mysqli_query($conn, $cmd);
$total = mysqli_num_rows($alunos);
$aluno = mysqli_fetch_array($alunos);

?>

<link rel="stylesheet" href="assets/libs/swiper/swiper-bundle.min.css">

   

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
       

          
                <div class="container-fluid">
                    <div class="profile-foreground position-relative mx-n4 mt-n4">
                        <div class="profile-wid-bg">
                            <img src="assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                        </div>
                    </div>
                    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                        <div class="row g-4">
                            <div class="col-auto">
                                <div class="avatar-lg">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-img"
                                        class="img-thumbnail rounded-circle" />
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col">
                                <div class="p-2">
                                    <h3 class="text-white mb-1"><?php echo $aluno['aluno_nome'] ?></h3>
                                    <p class="text-white-75">Aluno desde: <?php echo date('d/m/Y', strtotime($aluno['aluno_cad_data'])); ?> </p>
                                    <div class="hstack text-white-50 gap-1">
                                        <div class="me-2"><i
                                                class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i><?php echo $aluno['aluno_cidade'] ?>,
                                            <?php echo $aluno['aluno_uf'] ?></div>
                                        <div><i class=" ri-article-line
 me-1 text-white-75 fs-16 align-middle"></i><?php echo $aluno['aluno_cpf'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-12 col-lg-auto order-last order-lg-0">
                                <div class="row text text-white-50 text-center">
                                    <div class="col-lg-6 col-4">
                                        <div class="p-2">
                                            <h4 class="text-white mb-1">24.3K</h4>
                                            <p class="fs-14 mb-0">Followers</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-4">
                                        <div class="p-2">
                                            <h4 class="text-white mb-1">1.3K</h4>
                                            <p class="fs-14 mb-0">Following</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="d-flex">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab"
                                                role="tab">
                                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                                    class="d-none d-md-inline-block">Principal</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#activities"
                                                role="tab">
                                                <i class="ri-list-unordered d-inline-block d-md-none"></i> <span
                                                    class="d-none d-md-inline-block">Atividades</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
                                                <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span
                                                    class="d-none d-md-inline-block">Aulas</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                                    class="d-none d-md-inline-block">Taxas</span>
                                            </a>
                                        </li>
										
										 <li class="nav-item">
                                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                                    class="d-none d-md-inline-block">Financeiro</span>
                                            </a>
                                        </li>
										
										
										
                                    </ul>
                                    <div class="flex-shrink-0">
                                        <a href="pages-profile-settings.html" class="btn btn-success"><i
                                                class="ri-edit-box-line align-bottom"></i> Editar Cadastro</a>
                                    </div>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content pt-4 text-muted">
                                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-xxl-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-5">Qual opção colocar?</h5>
                                                        <div
                                                            class="progress animated-progress custom-progress progress-label">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 30%" aria-valuenow="30" aria-valuemin="0"
                                                                aria-valuemax="100">
                                                                <div class="label">30%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">Info</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless mb-0">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Nome:</th>
                                                                        <td class="text-muted"><?php echo $aluno['aluno_nome'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Telefone:</th>
                                                                        <td class="text-muted"><?php echo $aluno['aluno_cel'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                                        <td class="text-muted"><?php echo $aluno['aluno_email'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">CPF: :</th>
                                                                        <td class="text-muted"><?php echo $aluno['aluno_cpf'] ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="ps-0" scope="row">Endereço</th>
                                                                        <td class="text-muted"><?php echo $aluno['aluno_rua'] ?> , <?php echo $aluno['aluno_numero'] ?> <?php echo $aluno['aluno_complemento'] ?> <?php echo $aluno['aluno_bairro'] ?> <?php echo $aluno['aluno_cidade'] ?>, <?php echo $aluno['aluno_uf'] ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">Portfolio</h5>
                                                        <div class="d-flex flex-wrap gap-2">
                                                            <div>
                                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span
                                                                        class="avatar-title rounded-circle fs-16 bg-dark text-light">
                                                                        <i class="ri-github-fill"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span
                                                                        class="avatar-title rounded-circle fs-16 bg-primary">
                                                                        <i class="ri-global-fill"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span
                                                                        class="avatar-title rounded-circle fs-16 bg-success">
                                                                        <i class="ri-dribbble-fill"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span
                                                                        class="avatar-title rounded-circle fs-16 bg-danger">
                                                                        <i class="ri-pinterest-fill"></i>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">Skills</h5>
                                                        <div class="d-flex flex-wrap gap-2 fs-15">
                                                            <a href="javascript:void(0);"
                                                                class="badge badge-soft-primary">Photoshop</a>
                                                            <a href="javascript:void(0);"
                                                                class="badge badge-soft-primary">illustrator</a>
                                                            <a href="javascript:void(0);"
                                                                class="badge badge-soft-primary">HTML</a>
                                                            <a href="javascript:void(0);"
                                                                class="badge badge-soft-primary">CSS</a>
                                                            <a href="javascript:void(0);"
                                                                class="badge badge-soft-primary">Javascript</a>
                                                            <a href="javascript:void(0);"
                                                                class="badge badge-soft-primary">Php</a>
                                                            <a href="javascript:void(0);"
                                                                class="badge badge-soft-primary">Python</a>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div><!-- end card -->

                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center mb-4">
                                                            <div class="flex-grow-1">
                                                                <h5 class="card-title mb-0">Suggestions</h5>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <div class="dropdown">
                                                                    <a href="#" role="button" id="dropdownMenuLink2"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-2-fill fs-14"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        aria-labelledby="dropdownMenuLink2">
                                                                        <li><a class="dropdown-item" href="#">View</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Edit</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="avatar-xs flex-shrink-0 me-3">
                                                                    <img src="assets/images/users/avatar-3.jpg" alt=""
                                                                        class="img-fluid rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <div>
                                                                        <h5 class="fs-13 mb-1">Esther James</h5>
                                                                        <p class="fs-13 text-muted mb-0">Frontend
                                                                            Developer</p>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-success"><i
                                                                            class="ri-user-add-line align-middle"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="avatar-xs flex-shrink-0 me-3">
                                                                    <img src="assets/images/users/avatar-4.jpg" alt=""
                                                                        class="img-fluid rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <div>
                                                                        <h5 class="fs-13 mb-1">Jacqueline Steve</h5>
                                                                        <p class="fs-13 text-muted mb-0">UI/UX Designer
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-success"><i
                                                                            class="ri-user-add-line align-middle"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center py-3">
                                                                <div class="avatar-xs flex-shrink-0 me-3">
                                                                    <img src="assets/images/users/avatar-5.jpg" alt=""
                                                                        class="img-fluid rounded-circle" />
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <div>
                                                                        <h5 class="fs-13 mb-1">George Whalen</h5>
                                                                        <p class="fs-13 text-muted mb-0">Backend
                                                                            Developer</p>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-success"><i
                                                                            class="ri-user-add-line align-middle"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- end card body -->
                                                </div>
                                                <!--end card-->

                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center mb-4">
                                                            <div class="flex-grow-1">
                                                                <h5 class="card-title mb-0">Popular Posts</h5>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <div class="dropdown">
                                                                    <a href="#" role="button" id="dropdownMenuLink1"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-2-fill fs-14"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                                        aria-labelledby="dropdownMenuLink1">
                                                                        <li><a class="dropdown-item" href="#">View</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Edit</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mb-4">
                                                            <div class="flex-shrink-0">
                                                                <img src="assets/images/small/img-4.jpg" alt=""
                                                                    height="50" class="rounded" />
                                                            </div>
                                                            <div class="flex-grow-1 ms-3 overflow-hidden">
                                                                <a href="javascript:void(0);">
                                                                    <h6 class="text-truncate fs-13">Design your apps in
                                                                        your own way</h6>
                                                                </a>
                                                                <p class="text-muted mb-0">15 Dec 2021</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mb-4">
                                                            <div class="flex-shrink-0">
                                                                <img src="assets/images/small/img-5.jpg" alt=""
                                                                    height="50" class="rounded" />
                                                            </div>
                                                            <div class="flex-grow-1 ms-3 overflow-hidden">
                                                                <a href="javascript:void(0);">
                                                                    <h6 class="text-truncate fs-13">Smartest
                                                                        Applications for Business</h6>
                                                                </a>
                                                                <p class="text-muted mb-0">28 Nov 2021</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0">
                                                                <img src="assets/images/small/img-6.jpg" alt=""
                                                                    height="50" class="rounded" />
                                                            </div>
                                                            <div class="flex-grow-1 ms-3 overflow-hidden">
                                                                <a href="javascript:void(0);">
                                                                    <h6 class="text-truncate fs-13">How to get creative
                                                                        in your work</h6>
                                                                </a>
                                                                <p class="text-muted mb-0">21 Nov 2021</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end card-body-->
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                            <div class="col-xxl-9">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">About</h5>
                                                       sa
                                                        <div class="row">
                                                            <div class="col-6 col-md-4">
                                                                <div class="d-flex mt-4">
                                                                    <div
                                                                        class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                                        <div
                                                                            class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                            <i class="ri-user-2-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <p class="mb-1">Designation :</p>
                                                                        <h6 class="text-truncate mb-0">Lead Designer /
                                                                            Developer</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-6 col-md-4">
                                                                <div class="d-flex mt-4">
                                                                    <div
                                                                        class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                                        <div
                                                                            class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                            <i class="ri-global-line"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <p class="mb-1">Website :</p>
                                                                        <a href="#"
                                                                            class="fw-semibold">www.velzon.com</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                        <!--end row-->
                                                    </div>
                                                    <!--end card-body-->
                                                </div><!-- end card -->

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-header align-items-center d-flex">
                                                                <h4 class="card-title mb-0  me-2">Atividades Recentes</h4>
                                                                <div class="flex-shrink-0 ms-auto">
                                                            
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="tab-content text-muted">
                                                                    <div class="tab-pane active" id="today"
                                                                        role="tabpanel">
                                                                        <div class="profile-timeline">
                                                                            <div class="accordion accordion-flush"
                                                                                id="todayExample">
																				
																				
												 <div class="live-preview">
                                            <div class="list-group list-group-fill-success">
                                                <a href="#" class="list-group-item list-group-item-action "><i class="ri-download-2-fill align-middle me-2"></i>01/02/2021 - Realizou uma compra no valor de R$ 0,00</a>
                                                <a href="#" class="list-group-item list-group-item-action"><i class="ri-shield-check-line align-middle me-2"></i>01/02/2021 - Realizou uma aula de Carro</a>
                                                <a href="#" class="list-group-item list-group-item-action"><i class="ri-database-2-line align-middle me-2"></i>01/02/2021 - Utilizou uma taxa de xxxx</a>
                                                <a href="#" class="list-group-item list-group-item-action"><i class="ri-notification-3-line align-middle me-2"></i>01/02/2021 - Pagou uma conta no valor de 00 referente a venda xxx</a>
                                               
                                            </div>
                                        </div>
																				
																				
																				
																			
                                                                        </div>    </div>    </div>
                                                                   
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col -->
                                                </div><!-- end row -->

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Aulas praticas a realizar</h5>
                                                        <!-- Swiper -->
                                                        <div class="swiper project-swiper mt-n4">
                                                            <div class="d-flex justify-content-end gap-2 mb-2">
                                                                <div class="slider-button-prev">
                                                                    <div class="avatar-title fs-18 rounded px-1">
                                                                        <i class="ri-arrow-left-s-line"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="slider-button-next">
                                                                    <div class="avatar-title fs-18 rounded px-1">
                                                                        <i class="ri-arrow-right-s-line"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <div
                                                                        class="card profile-project-card shadow-none profile-project-warning mb-0">
                                                                        <div class="card-body p-4">
                                                                            <div class="d-flex">
                                                                                <div
                                                                                    class="flex-grow-1 text-muted overflow-hidden">
                                                                                    <h5
                                                                                        class="fs-14 text-truncate mb-1">
                                                                                        <a href="#"
                                                                                            class="text-dark">Aula de carro</a>
                                                                                    </h5>
                                                                                    <p
                                                                                        class="text-muted text-truncate mb-0">
                                                                                       Data : <span
                                                                                            class="fw-semibold text-dark">01/12 as xx hs</span></p>
                                                                                </div>
                                                                                <div class="flex-shrink-0 ms-2">
                                                                                    <div
                                                                                        class="badge badge-soft-warning fs-10">
                                                                                        A realizar</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="d-flex mt-4">
                                                                                <div class="flex-grow-1">
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-2">
                                                                                        <div>
                                                                                            <h5
                                                                                                class="fs-12 text-muted mb-0">
                                                                                                Instrutor : xxxx</h5>
																							
																							<h5
                                                                                                class="fs-12 text-muted mb-0">
                                                                                                Veículo : xxxx</h5>
                                                                                        </div>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end card body -->
                                                                    </div>
                                                                    <!-- end card -->
                                                                </div>
                                                                <!-- end slide item -->
                                                                <div class="swiper-slide">
                                                                    <div
                                                                        class="card profile-project-card shadow-none profile-project-danger mb-0">
                                                                        <div class="card-body p-4">
                                                                            <div class="d-flex">
                                                                                <div
                                                                                    class="flex-grow-1 text-muted overflow-hidden">
                                                                                    <h5
                                                                                        class="fs-14 text-truncate mb-1">
                                                                                        <a href="#"
                                                                                            class="text-dark">Aula de carro</a></h5>
                                                                                    <p
                                                                                        class="text-muted text-truncate mb-0">
                                                                                        Data : <span
                                                                                            class="fw-semibold text-dark">01/01/2021 às 08:00</span></p>
                                                                                </div>
                                                                                <div class="flex-shrink-0 ms-2">
                                                                                    <div
                                                                                        class="badge badge-soft-danger fs-10">
                                                                                        Não realizada</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="d-flex mt-4">
                                                                                <div class="flex-grow-1">
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-2">
                                                                                        <div>
                                                                                            <h5
                                                                                                class="fs-12 text-muted mb-0">
                                                                                                Instrutor : xxxx </h5>
																							 <h5
                                                                                                class="fs-12 text-muted mb-0">
                                                                                                Veiculo : xxxx </h5>
                                                                                        </div>
                                                                                        
                                                                                           
                                                                                      
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- end card body -->
                                                                    </div><!-- end card -->
                                                                </div><!-- end slide item -->
														
														
														
														
                                                                <div class="swiper-slide">
                                                                    <div
                                                                        class="card profile-project-card shadow-none profile-project-info mb-0">
                                                                        <div class="card-body p-4">
                                                                            <div class="d-flex">
                                                                                <div
                                                                                    class="flex-grow-1 text-muted overflow-hidden">
                                                                                    <h5
                                                                                        class="fs-14 text-truncate mb-1">
                                                                                        <a href="#"
                                                                                            class="text-dark">Brand logo
                                                                                            Design</a></h5>
                                                                                    <p
                                                                                        class="text-muted text-truncate mb-0">
                                                                                        Last Update : <span
                                                                                            class="fw-semibold text-dark">2
                                                                                            hr Ago</span></p>
                                                                                </div>
                                                                                <div class="flex-shrink-0 ms-2">
                                                                                    <div
                                                                                        class="badge badge-soft-warning fs-10">
                                                                                        Inprogress</div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="d-flex mt-4">
                                                                                <div class="flex-grow-1">
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-2">
                                                                                        <div>
                                                                                            <h5
                                                                                                class="fs-12 text-muted mb-0">
                                                                                                Members :</h5>
                                                                                        </div>
                                                                                        <div class="avatar-group">
                                                                                            <div
                                                                                                class="avatar-group-item">
                                                                                                <div class="avatar-xs">
                                                                                                    <img src="assets/images/users/avatar-5.jpg"
                                                                                                        alt=""
                                                                                                        class="rounded-circle img-fluid" />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- end card body -->
                                                                    </div><!-- end card -->
                                                                </div><!-- end slide item -->
                                                                <div class="swiper-slide">
                                                                    <div
                                                                        class="card profile-project-card shadow-none profile-project-danger mb-0">
                                                                        <div class="card-body p-4">
                                                                            <div class="d-flex">
                                                                                <div
                                                                                    class="flex-grow-1 text-muted overflow-hidden">
                                                                                    <h5
                                                                                        class="fs-14 text-truncate mb-1">
                                                                                        <a href="#"
                                                                                            class="text-dark">Project
                                                                                            update</a></h5>
                                                                                    <p
                                                                                        class="text-muted text-truncate mb-0">
                                                                                        Last Update : <span
                                                                                            class="fw-semibold text-dark">4
                                                                                            hr Ago</span></p>
                                                                                </div>
                                                                                <div class="flex-shrink-0 ms-2">
                                                                                    <div
                                                                                        class="badge badge-soft-success fs-10">
                                                                                        Completed</div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="d-flex mt-4">
                                                                                <div class="flex-grow-1">
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-2">
                                                                                        <div>
                                                                                            <h5
                                                                                                class="fs-12 text-muted mb-0">
                                                                                                Members :</h5>
                                                                                        </div>
                                                                                        <div class="avatar-group">
                                                                                            <div
                                                                                                class="avatar-group-item">
                                                                                                <div class="avatar-xs">
                                                                                                    <img src="assets/images/users/avatar-4.jpg"
                                                                                                        alt=""
                                                                                                        class="rounded-circle img-fluid" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="avatar-group-item">
                                                                                                <div class="avatar-xs">
                                                                                                    <img src="assets/images/users/avatar-5.jpg"
                                                                                                        alt=""
                                                                                                        class="rounded-circle img-fluid" />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end card body -->
                                                                    </div>
                                                                    <!-- end card -->
                                                                </div>
                                                                <!-- end slide item -->
                                                                <div class="swiper-slide">
                                                                    <div
                                                                        class="card profile-project-card shadow-none profile-project-warning mb-0">
                                                                        <div class="card-body p-4">
                                                                            <div class="d-flex">
                                                                                <div
                                                                                    class="flex-grow-1 text-muted overflow-hidden">
                                                                                    <h5
                                                                                        class="fs-14 text-truncate mb-1">
                                                                                        <a href="#"
                                                                                            class="text-dark">Chat
                                                                                            App</a></h5>
                                                                                    <p
                                                                                        class="text-muted text-truncate mb-0">
                                                                                        Last Update : <span
                                                                                            class="fw-semibold text-dark">1
                                                                                            hr Ago</span></p>
                                                                                </div>
                                                                                <div class="flex-shrink-0 ms-2">
                                                                                    <div
                                                                                        class="badge badge-soft-warning fs-10">
                                                                                        Inprogress</div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="d-flex mt-4">
                                                                                <div class="flex-grow-1">
                                                                                    <div
                                                                                        class="d-flex align-items-center gap-2">
                                                                                        <div>
                                                                                            <h5
                                                                                                class="fs-12 text-muted mb-0">
                                                                                                Members :</h5>
                                                                                        </div>
                                                                                        <div class="avatar-group">
                                                                                            <div
                                                                                                class="avatar-group-item">
                                                                                                <div class="avatar-xs">
                                                                                                    <img src="assets/images/users/avatar-4.jpg"
                                                                                                        alt=""
                                                                                                        class="rounded-circle img-fluid" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="avatar-group-item">
                                                                                                <div class="avatar-xs">
                                                                                                    <img src="assets/images/users/avatar-5.jpg"
                                                                                                        alt=""
                                                                                                        class="rounded-circle img-fluid" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="avatar-group-item">
                                                                                                <div class="avatar-xs">
                                                                                                    <div
                                                                                                        class="avatar-title rounded-circle bg-light text-primary">
                                                                                                        A
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end card body -->
                                                                    </div>
                                                                    <!-- end card -->
                                                                </div>
                                                                <!-- end slide item -->
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <!-- end card body -->
                                                </div><!-- end card -->

                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <div class="tab-pane fade" id="activities" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Activities</h5>
                                                <div class="acitivity-timeline">
                                                    <div class="acitivity-item d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-1.jpg" alt=""
                                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Oliver Phillips <span
                                                                    class="badge bg-soft-primary text-primary align-middle">New</span>
                                                            </h6>
                                                            <p class="text-muted mb-2">We talked about a project on
                                                                linkedin.</p>
                                                            <small class="mb-0 text-muted">Today</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                            <div
                                                                class="avatar-title bg-soft-success text-success rounded-circle">
                                                                N
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Nancy Martino <span
                                                                    class="badge bg-soft-secondary text-secondary align-middle">In
                                                                    Progress</span></h6>
                                                            <p class="text-muted mb-2"><i
                                                                    class="ri-file-text-line align-middle ms-2"></i>
                                                                Create new project Buildng product</p>
                                                            <div class="avatar-group mb-2">
                                                                <a href="javascript: void(0);" class="avatar-group-item"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="" data-bs-original-title="Christi">
                                                                    <img src="assets/images/users/avatar-4.jpg" alt=""
                                                                        class="rounded-circle avatar-xs" />
                                                                </a>
                                                                <a href="javascript: void(0);" class="avatar-group-item"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="" data-bs-original-title="Frank Hook">
                                                                    <img src="assets/images/users/avatar-3.jpg" alt=""
                                                                        class="rounded-circle avatar-xs" />
                                                                </a>
                                                                <a href="javascript: void(0);" class="avatar-group-item"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="" data-bs-original-title=" Ruby">
                                                                    <div class="avatar-xs">
                                                                        <div
                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                            R
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                                <a href="javascript: void(0);" class="avatar-group-item"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="" data-bs-original-title="more">
                                                                    <div class="avatar-xs">
                                                                        <div class="avatar-title rounded-circle">
                                                                            2+
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <small class="mb-0 text-muted">Yesterday</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-2.jpg" alt=""
                                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Natasha Carey <span
                                                                    class="badge bg-soft-success text-success align-middle">Completed</span>
                                                            </h6>
                                                            <p class="text-muted mb-2">Adding a new event with
                                                                attachments</p>
                                                            <div class="row">
                                                                <div class="col-xxl-4">
                                                                    <div class="row border border-dashed gx-2 p-2 mb-2">
                                                                        <div class="col-4">
                                                                            <img src="assets/images/small/img-2.jpg"
                                                                                alt="" class="img-fluid rounded" />
                                                                        </div>
                                                                        <!--end col-->
                                                                        <div class="col-4">
                                                                            <img src="assets/images/small/img-3.jpg"
                                                                                alt="" class="img-fluid rounded" />
                                                                        </div>
                                                                        <!--end col-->
                                                                        <div class="col-4">
                                                                            <img src="assets/images/small/img-4.jpg"
                                                                                alt="" class="img-fluid rounded" />
                                                                        </div>
                                                                        <!--end col-->
                                                                    </div>
                                                                    <!--end row-->
                                                                </div>
                                                            </div>
                                                            <small class="mb-0 text-muted">25 Nov</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-6.jpg" alt=""
                                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Bethany Johnson</h6>
                                                            <p class="text-muted mb-2">added a new member to velzon
                                                                dashboard</p>
                                                            <small class="mb-0 text-muted">19 Nov</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xs acitivity-avatar">
                                                                <div
                                                                    class="avatar-title rounded-circle bg-soft-danger text-danger">
                                                                    <i class="ri-shopping-bag-line"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Your order is placed <span
                                                                    class="badge bg-soft-danger text-danger align-middle ms-1">Out
                                                                    of Delivery</span></h6>
                                                            <p class="text-muted mb-2">These customers can rest assured
                                                                their order has been placed.</p>
                                                            <small class="mb-0 text-muted">16 Nov</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-7.jpg" alt=""
                                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Lewis Pratt</h6>
                                                            <p class="text-muted mb-2">They all have something to say
                                                                beyond the words on the page. They can come across as
                                                                casual or neutral, exotic or graphic. </p>
                                                            <small class="mb-0 text-muted">22 Oct</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xs acitivity-avatar">
                                                                <div
                                                                    class="avatar-title rounded-circle bg-soft-info text-info">
                                                                    <i class="ri-line-chart-line"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">Monthly sales report</h6>
                                                            <p class="text-muted mb-2"><span class="text-danger">2 days
                                                                    left</span> notification to submit the monthly sales
                                                                report. <a href="javascript:void(0);"
                                                                    class="link-warning text-decoration-underline">Reports
                                                                    Builder</a></p>
                                                            <small class="mb-0 text-muted">15 Oct</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-8.jpg" alt=""
                                                                class="avatar-xs rounded-circle acitivity-avatar" />
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1">New ticket received <span
                                                                    class="badge bg-soft-success text-success align-middle">Completed</span>
                                                            </h6>
                                                            <p class="text-muted mb-2">User <span
                                                                    class="text-secondary">Erica245</span> submitted a
                                                                ticket.</p>
                                                            <small class="mb-0 text-muted">26 Aug</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                    </div>
                                    <!--end tab-pane-->
                                    <div class="tab-pane fade" id="projects" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-warning">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Chat App Update</a>
                                                                        </h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">2 year
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-warning fs-10">
                                                                            Inprogress</div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-1.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-3.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                                            J
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-success">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">ABC Project
                                                                                Customization</a></h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">2 month
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-primary fs-10">
                                                                            Progress</div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-8.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-7.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-6.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-primary">
                                                                                            2+
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-info">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Client - Frank
                                                                                Hook</a></h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">1 hr
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-info fs-10">New
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-4.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                                            M
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-3.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-primary">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Velzon Project</a>
                                                                        </h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">11 hr
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-success fs-10">
                                                                            Completed</div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-7.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-5.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-danger">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Brand Logo Design</a>
                                                                        </h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">10 min
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-info fs-10">New
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-7.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-6.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                                            E
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-primary">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Chat App</a></h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">8 hr
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-warning fs-10">
                                                                            Inprogress</div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                                            R
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-3.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-8.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-warning">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Project Update</a>
                                                                        </h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">48 min
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-warning fs-10">
                                                                            Inprogress</div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-6.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-5.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-4.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none profile-project-success">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Client - Jennifer</a>
                                                                        </h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">30 min
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-primary fs-10">
                                                                            Process</div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-1.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none mb-xxl-0   profile-project-info">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Bsuiness Template -
                                                                                UI/UX design</a></h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">7 month
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-success fs-10">
                                                                            Completed</div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-2.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-3.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-4.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-primary">
                                                                                            2+
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end card body -->
                                                        </div>
                                                        <!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none mb-xxl-0  profile-project-success">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Update Project</a>
                                                                        </h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">1 month
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-info fs-10">New
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-7.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-light text-primary">
                                                                                            A
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none mb-sm-0  profile-project-danger">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">Bank Management
                                                                                System</a></h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">10 month
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-success fs-10">
                                                                            Completed</div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-7.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-6.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-5.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <div
                                                                                            class="avatar-title rounded-circle bg-primary">
                                                                                            2+
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div
                                                            class="card profile-project-card shadow-none mb-0  profile-project-primary">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate"><a href="#"
                                                                                class="text-dark">PSD to HTML
                                                                                Convert</a></h5>
                                                                        <p class="text-muted text-truncate mb-0">Last
                                                                            Update : <span
                                                                                class="fw-semibold text-dark">29 min
                                                                                Ago</span></p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="badge badge-soft-info fs-10">New
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Members :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <div class="avatar-group-item">
                                                                                    <div class="avatar-xs">
                                                                                        <img src="assets/images/users/avatar-7.jpg"
                                                                                            alt=""
                                                                                            class="rounded-circle img-fluid" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="mt-4">
                                                            <ul
                                                                class="pagination pagination-separated justify-content-center mb-0">
                                                                <li class="page-item disabled">
                                                                    <a href="javascript:void(0);" class="page-link"><i
                                                                            class="mdi mdi-chevron-left"></i></a>
                                                                </li>
                                                                <li class="page-item active">
                                                                    <a href="javascript:void(0);"
                                                                        class="page-link">1</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="javascript:void(0);"
                                                                        class="page-link">2</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="javascript:void(0);"
                                                                        class="page-link">3</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="javascript:void(0);"
                                                                        class="page-link">4</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="javascript:void(0);"
                                                                        class="page-link">5</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="javascript:void(0);" class="page-link"><i
                                                                            class="mdi mdi-chevron-right"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                    </div>
                                    <!--end tab-pane-->
                                    <div class="tab-pane fade" id="documents" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-4">
                                                    <h5 class="card-title flex-grow-1 mb-0">Documents</h5>
                                                    <div class="flex-shrink-0">
                                                        <input class="form-control d-none" type="file" id="formFile">
                                                        <label for="formFile" class="btn btn-danger"><i
                                                                class="ri-upload-2-fill me-1 align-bottom"></i> Upload
                                                            File</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless align-middle mb-0">
                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <th scope="col">File Name</th>
                                                                        <th scope="col">Type</th>
                                                                        <th scope="col">Size</th>
                                                                        <th scope="col">Upload Date</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="avatar-sm">
                                                                                    <div
                                                                                        class="avatar-title bg-soft-primary text-primary rounded fs-20">
                                                                                        <i class="ri-file-zip-fill"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="ms-3 flex-grow-1">
                                                                                    <h6 class="fs-14 mb-0"><a
                                                                                            href="javascript:void(0)"
                                                                                            class="text-body">Artboard-documents.zip</a>
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>Zip File</td>
                                                                        <td>4.57 MB</td>
                                                                        <td>12 Dec 2021</td>
                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <a href="javascript:void(0);"
                                                                                    class="btn btn-light btn-icon"
                                                                                    id="dropdownMenuLink15"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="true">
                                                                                    <i class="ri-equalizer-fill"></i>
                                                                                </a>
                                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                                    aria-labelledby="dropdownMenuLink15">
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-eye-fill me-2 align-middle text-muted"></i>View</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a>
                                                                                    </li>
                                                                                    <li class="dropdown-divider"></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="avatar-sm">
                                                                                    <div
                                                                                        class="avatar-title bg-soft-danger text-danger rounded fs-20">
                                                                                        <i class="ri-file-pdf-fill"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="ms-3 flex-grow-1">
                                                                                    <h6 class="fs-14 mb-0"><a
                                                                                            href="javascript:void(0);"
                                                                                            class="text-body">Bank
                                                                                            Management System</a></h6>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>PDF File</td>
                                                                        <td>8.89 MB</td>
                                                                        <td>24 Nov 2021</td>
                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <a href="javascript:void(0);"
                                                                                    class="btn btn-light btn-icon"
                                                                                    id="dropdownMenuLink3"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="true">
                                                                                    <i class="ri-equalizer-fill"></i>
                                                                                </a>
                                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                                    aria-labelledby="dropdownMenuLink3">
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-eye-fill me-2 align-middle text-muted"></i>View</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a>
                                                                                    </li>
                                                                                    <li class="dropdown-divider"></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="avatar-sm">
                                                                                    <div
                                                                                        class="avatar-title bg-soft-secondary text-secondary rounded fs-20">
                                                                                        <i class="ri-video-line"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="ms-3 flex-grow-1">
                                                                                    <h6 class="fs-14 mb-0"><a
                                                                                            href="javascript:void(0);"
                                                                                            class="text-body">Tour-video.mp4</a>
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>MP4 File</td>
                                                                        <td>14.62 MB</td>
                                                                        <td>19 Nov 2021</td>
                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <a href="javascript:void(0);"
                                                                                    class="btn btn-light btn-icon"
                                                                                    id="dropdownMenuLink4"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="true">
                                                                                    <i class="ri-equalizer-fill"></i>
                                                                                </a>
                                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                                    aria-labelledby="dropdownMenuLink4">
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-eye-fill me-2 align-middle text-muted"></i>View</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a>
                                                                                    </li>
                                                                                    <li class="dropdown-divider"></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="avatar-sm">
                                                                                    <div
                                                                                        class="avatar-title bg-soft-success text-success rounded fs-20">
                                                                                        <i
                                                                                            class="ri-file-excel-fill"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="ms-3 flex-grow-1">
                                                                                    <h6 class="fs-14 mb-0"><a
                                                                                            href="javascript:void(0);"
                                                                                            class="text-body">Account-statement.xsl</a>
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>XSL File</td>
                                                                        <td>2.38 KB</td>
                                                                        <td>14 Nov 2021</td>
                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <a href="javascript:void(0);"
                                                                                    class="btn btn-light btn-icon"
                                                                                    id="dropdownMenuLink5"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="true">
                                                                                    <i class="ri-equalizer-fill"></i>
                                                                                </a>
                                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                                    aria-labelledby="dropdownMenuLink5">
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-eye-fill me-2 align-middle text-muted"></i>View</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a>
                                                                                    </li>
                                                                                    <li class="dropdown-divider"></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="avatar-sm">
                                                                                    <div
                                                                                        class="avatar-title bg-soft-info text-info rounded fs-20">
                                                                                        <i class="ri-folder-line"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="ms-3 flex-grow-1">
                                                                                    <h6 class="fs-14 mb-0"><a
                                                                                            href="javascript:void(0);"
                                                                                            class="text-body">Project
                                                                                            Screenshots Collection</a>
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>Floder File</td>
                                                                        <td>87.24 MB</td>
                                                                        <td>08 Nov 2021</td>
                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <a href="javascript:void(0);"
                                                                                    class="btn btn-light btn-icon"
                                                                                    id="dropdownMenuLink6"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="true">
                                                                                    <i class="ri-equalizer-fill"></i>
                                                                                </a>
                                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                                    aria-labelledby="dropdownMenuLink6">
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-eye-fill me-2 align-middle"></i>View</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-download-2-fill me-2 align-middle"></i>Download</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="avatar-sm">
                                                                                    <div
                                                                                        class="avatar-title bg-soft-danger text-danger rounded fs-20">
                                                                                        <i class="ri-image-2-fill"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="ms-3 flex-grow-1">
                                                                                    <h6 class="fs-14 mb-0"><a
                                                                                            href="javascript:void(0);"
                                                                                            class="text-body">Velzon-logo.png</a>
                                                                                    </h6>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>PNG File</td>
                                                                        <td>879 KB</td>
                                                                        <td>02 Nov 2021</td>
                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <a href="javascript:void(0);"
                                                                                    class="btn btn-light btn-icon"
                                                                                    id="dropdownMenuLink7"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="true">
                                                                                    <i class="ri-equalizer-fill"></i>
                                                                                </a>
                                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                                    aria-labelledby="dropdownMenuLink7">
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-eye-fill me-2 align-middle"></i>View</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-download-2-fill me-2 align-middle"></i>Download</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="javascript:void(0);"><i
                                                                                                class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <a href="javascript:void(0);" class="text-success "><i
                                                                    class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i>
                                                                Load more </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end tab-pane-->
                                </div>
                                <!--end tab-content-->
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                </div><!-- container-fluid -->
            </div><!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div><!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->


   

    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- swiper js -->
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- profile init js -->
    <script src="assets/js/pages/profile.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>


</html>