@extends('layouts.apps')

@section('content')

<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Analytics</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Analytics</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-body p-20">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div
                                class="trail-bg h-100 text-center d-flex flex-column justify-content-between align-items-center p-16 radius-8">
                                <h6 class="text-white text-xl">Upgrade Your Plan</h6>
                                <div class="">
                                    <p class="text-white">Your free trial expired in 7 days</p>
                                    <a href="#"
                                        class="btn py-8 rounded-pill w-100 bg-gradient-blue-warning text-sm">Upgrade
                                        Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row g-3">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="radius-8 h-100 text-center p-20 bg-purple-light">
                                        <span
                                            class="w-44-px h-44-px radius-8 d-inline-flex justify-content-center align-items-center text-xl mb-12 bg-lilac-200 border border-lilac-400 text-lilac-600">
                                            <i class="ri-price-tag-3-fill"></i>
                                        </span>
                                        <span class="text-neutral-700 d-block">Total Sales</span>
                                        <h6 class="mb-0 mt-4">$170,500.09</h6>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="radius-8 h-100 text-center p-20 bg-success-100">
                                        <span
                                            class="w-44-px h-44-px radius-8 d-inline-flex justify-content-center align-items-center text-xl mb-12 bg-success-200 border border-success-400 text-success-600">
                                            <i class="ri-shopping-cart-2-fill"></i>
                                        </span>
                                        <span class="text-neutral-700 d-block">Total Orders</span>
                                        <h6 class="mb-0 mt-4">1,500</h6>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="radius-8 h-100 text-center p-20 bg-info-focus">
                                        <span
                                            class="w-44-px h-44-px radius-8 d-inline-flex justify-content-center align-items-center text-xl mb-12 bg-info-200 border border-info-400 text-info-600">
                                            <i class="ri-group-3-fill"></i>
                                        </span>
                                        <span class="text-neutral-700 d-block">Visitor</span>
                                        <h6 class="mb-0 mt-4">12,300</h6>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="radius-8 h-100 text-center p-20 bg-danger-100">
                                        <span
                                            class="w-44-px h-44-px radius-8 d-inline-flex justify-content-center align-items-center text-xl mb-12 bg-danger-200 border border-danger-400 text-danger-600">
                                            <i class="ri-refund-2-line"></i>
                                        </span>
                                        <span class="text-neutral-700 d-block">Refunded</span>
                                        <h6 class="mb-0 mt-4">2756</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-xxl-8">
            <div class="card h-100">
                <div
                    class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
                    <h6 class="text-lg fw-semibold mb-0">Recent Activity</h6>
                    <a href="javascript:void(0)"
                        class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
                        View All
                        <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table mb-0 rounded-0 border-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="bg-transparent rounded-0">Customer</th>
                                    <th scope="col" class="bg-transparent rounded-0">ID</th>
                                    <th scope="col" class="bg-transparent rounded-0">Retained</th>
                                    <th scope="col" class="bg-transparent rounded-0">Amount</th>
                                    <th scope="col" class="bg-transparent rounded-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/user-grid/user-grid-img1.png" alt=""
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0">Kristin Watson</h6>
                                                <span
                                                    class="text-sm text-secondary-light fw-medium">ulfaha@mail.ru</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>#63254</td>
                                    <td>5 min ago</td>
                                    <td>$12,408.12</td>
                                    <td> <span
                                            class="bg-success-focus text-success-main px-10 py-4 radius-8 fw-medium text-sm">Member</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/user-grid/user-grid-img2.png" alt=""
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0">Theresa Webb</h6>
                                                <span
                                                    class="text-sm text-secondary-light fw-medium">joie@gmail.com</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>#63254</td>
                                    <td>12 min ago</td>
                                    <td>$12,408.12</td>
                                    <td> <span
                                            class="bg-lilac-100 text-lilac-600 px-10 py-4 radius-8 fw-medium text-sm">New
                                            Customer</span> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/user-grid/user-grid-img3.png" alt=""
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0">Brooklyn Simmons</h6>
                                                <span
                                                    class="text-sm text-secondary-light fw-medium">warn@mail.ru</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>#63254</td>
                                    <td>15 min ago</td>
                                    <td>$12,408.12</td>
                                    <td> <span
                                            class="bg-warning-focus text-warning-main px-10 py-4 radius-8 fw-medium text-sm">Signed
                                            Up </span> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/user-grid/user-grid-img4.png" alt=""
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0">Robert Fox</h6>
                                                <span
                                                    class="text-sm text-secondary-light fw-medium">fellora@mail.ru</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>#63254</td>
                                    <td>17 min ago</td>
                                    <td>$12,408.12</td>
                                    <td> <span
                                            class="bg-success-focus text-success-main px-10 py-4 radius-8 fw-medium text-sm">Member</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/user-grid/user-grid-img5.png" alt=""
                                                class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0">Jane Cooper</h6>
                                                <span
                                                    class="text-sm text-secondary-light fw-medium">zitka@mail.ru</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>#63254</td>
                                    <td>25 min ago</td>
                                    <td>$12,408.12</td>
                                    <td> <span
                                            class="bg-warning-focus text-warning-main px-10 py-4 radius-8 fw-medium text-sm">Signed
                                            Up </span> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
