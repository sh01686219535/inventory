<div class="app-brand demo">
                    <a href="{{route('dashboard')}}" class="app-brand-link" style="display: inline-block;margin:auto;">
                        <span class="app-brand-logo demo">
                         <img src="{{asset('backEndAssets/assets/img/logo/tech.png')}}" style="width: 80px; height:50px;" alt="">
                        </span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item active">
                        <a href="{{route('dashboard')}}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <!-- Manage Supplier -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Manage Supplier</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('supplier')}}" class="menu-link">
                                    <div data-i18n="Without menu">All Supplier</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Supplier --}}
                    <!-- Manage Customer -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Manage Customer</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('customer')}}" class="menu-link">
                                    <div data-i18n="Without menu">All Customer</div>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('Credit.customer')}}" class="menu-link">
                                    <div data-i18n="Without menu">Credit Customer</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Customer --}}
                      <!-- Manage Unit -->
                      <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Manage Unit</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('unit')}}" class="menu-link">
                                    <div data-i18n="Without menu">All Unit</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Unit --}}
                       <!-- Manage Category -->
                       <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Manage Category</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('category')}}" class="menu-link">
                                    <div data-i18n="Without menu">All Category</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- end Category --}}
                    <!-- Manage Product -->
                        <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-layout"></i>
                                <div data-i18n="Layouts">Manage Product</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item">
                                    <a href="{{route('product')}}" class="menu-link">
                                        <div data-i18n="Without menu">All Product</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    {{-- end Product --}}
                      <!-- Manage Purchase -->
                      <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Manage Purchase</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('purchase')}}" class="menu-link">
                                    <div data-i18n="Without menu">All Purchase</div>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('pending.purchase')}}" class="menu-link">
                                    <div data-i18n="Without menu">Approve Purchase</div>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('daily.purchase.report')}}" class="menu-link">
                                    <div data-i18n="Without menu">Daily Purchase Report</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                     <!-- End Manage Purchase -->
                         <!-- Manage Invoice -->
                         <li class="menu-item">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-layout"></i>
                                <div data-i18n="Layouts">Manage Invoice</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item">
                                    <a href="{{route('invoice')}}" class="menu-link">
                                        <div data-i18n="Without menu">All Invoice</div>
                                    </a>
                                </li>
                            </ul>
                            <ul class="menu-sub">
                                <li class="menu-item">
                                    <a href="{{route('pending.invoice')}}" class="menu-link">
                                        <div data-i18n="Without menu">Approval Invoice</div>
                                    </a>
                                </li>
                            </ul>
                            <ul class="menu-sub">
                                <li class="menu-item">
                                    <a href="{{route('print.invoice')}}" class="menu-link">
                                        <div data-i18n="Without menu">Print Invoice List</div>
                                    </a>
                                </li>
                            </ul>
                            <ul class="menu-sub">
                                <li class="menu-item">
                                    <a href="{{route('daily.invoice.report')}}" class="menu-link">
                                        <div data-i18n="Without menu">Daily Invoice Report</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         <!-- End Manage Invoice -->
                          <!-- Manage Stock -->
                      <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Manage Stock</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('stock.report')}}" class="menu-link">
                                    <div data-i18n="Without menu">Stock Report</div>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{route('stock.supplier.wise')}}" class="menu-link">
                                    <div data-i18n="Without menu">Supplier/ Product Wise</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                     <!-- End Manage Stock -->
                </ul>
