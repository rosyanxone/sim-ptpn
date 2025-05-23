@extends('layouts.users')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
    <section class="flex h-full items-center justify-center">
        <div class="w-fit rounded-lg bg-white p-4 space-y-8 shadow-lg hover:shadow-none">
            <h1 class="font-medium text-xl text-center">Sistem Informasi Manajemen - PT Perusahaan Nusantara IV Regional 5</h1>
            <img class="rounded-md border border-gray-200" src="{{ asset('images/dashboard.png') }}" alt="Dashboard Poster">
        </div>
    </section>
    <section class="hidden">
        <div class="mb-6 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-lg bg-white p-6 shadow-md">
                <div class="flex items-center">
                    <div class="rounded-full bg-green-100 p-3 text-green-600">
                        <i class="fas fa-box fa-2x"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Products</p>
                        <p class="text-2xl font-semibold text-gray-700">{{ $totalProducts ?? 24 }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a class="text-sm font-medium text-green-600 hover:text-green-800" href="#">View
                        all products</a>
                </div>
            </div>

            <div class="rounded-lg bg-white p-6 shadow-md">
                <div class="flex items-center">
                    <div class="rounded-full bg-blue-100 p-3 text-blue-600">
                        <i class="fas fa-shopping-cart fa-2x"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Orders</p>
                        <p class="text-2xl font-semibold text-gray-700">{{ $totalOrders ?? 156 }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a class="text-sm font-medium text-blue-600 hover:text-blue-800" href="#">View all
                        orders</a>
                </div>
            </div>

            <div class="rounded-lg bg-white p-6 shadow-md">
                <div class="flex items-center">
                    <div class="rounded-full bg-yellow-100 p-3 text-yellow-600">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Customers</p>
                        <p class="text-2xl font-semibold text-gray-700">{{ $totalCustomers ?? 1204 }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a class="text-sm font-medium text-yellow-600 hover:text-yellow-800" href="#">View all
                        customers</a>
                </div>
            </div>

            <div class="rounded-lg bg-white p-6 shadow-md">
                <div class="flex items-center">
                    <div class="rounded-full bg-red-100 p-3 text-red-600">
                        <i class="fas fa-dollar-sign fa-2x"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Total Revenue</p>
                        <p class="text-2xl font-semibold text-gray-700">${{ $totalRevenue ?? '24,500' }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a class="text-sm font-medium text-red-600 hover:text-red-800" href="#">View
                        detailed reports</a>
                </div>
            </div>
        </div>

        <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
            <div class="rounded-lg bg-white p-6 shadow-md">
                <h2 class="mb-4 text-lg font-semibold text-gray-700">Recent Orders</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                    scope="col">Order ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                    scope="col">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                    scope="col">Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                    scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">#ORD-001</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">John Doe</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">$1,200</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <span
                                        class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Completed</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">#ORD-002</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">Jane Smith</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">$850</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <span
                                        class="inline-flex rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">Processing</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">#ORD-003</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">Robert Johnson</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">$2,400</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <span
                                        class="inline-flex rounded-full bg-blue-100 px-2 text-xs font-semibold leading-5 text-blue-800">Shipped</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">#ORD-004</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">Emily Davis</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">$950</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <span
                                        class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">Cancelled</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    <a class="text-sm font-medium text-green-600 hover:text-green-800" href="#">View
                        all orders</a>
                </div>
            </div>

            <div class="rounded-lg bg-white p-6 shadow-md">
                <h2 class="mb-4 text-lg font-semibold text-gray-700">Recent Customers</h2>
                <div class="space-y-4">
                    <div class="flex items-center rounded-lg p-2 hover:bg-gray-50">
                        <img class="h-10 w-10 rounded-full object-cover"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Customer">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-700">Sarah Johnson</p>
                            <p class="text-xs text-gray-500">sarah.johnson@example.com</p>
                        </div>
                        <div class="ml-auto text-sm text-gray-500">
                            <span class="rounded bg-green-100 px-2 py-0.5 text-xs font-medium text-green-800">New</span>
                        </div>
                    </div>
                    <div class="flex items-center rounded-lg p-2 hover:bg-gray-50">
                        <img class="h-10 w-10 rounded-full object-cover"
                            src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Customer">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-700">Michael Brown</p>
                            <p class="text-xs text-gray-500">michael.brown@example.com</p>
                        </div>
                        <div class="ml-auto text-sm text-gray-500">2 days ago</div>
                    </div>
                    <div class="flex items-center rounded-lg p-2 hover:bg-gray-50">
                        <img class="h-10 w-10 rounded-full object-cover"
                            src="https://images.unsplash.com/photo-1520813792240-56fc4a3765a7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Customer">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-700">Lisa Anderson</p>
                            <p class="text-xs text-gray-500">lisa.anderson@example.com</p>
                        </div>
                        <div class="ml-auto text-sm text-gray-500">5 days ago</div>
                    </div>
                    <div class="flex items-center rounded-lg p-2 hover:bg-gray-50">
                        <img class="h-10 w-10 rounded-full object-cover"
                            src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Customer">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-700">David Wilson</p>
                            <p class="text-xs text-gray-500">david.wilson@example.com</p>
                        </div>
                        <div class="ml-auto text-sm text-gray-500">1 week ago</div>
                    </div>
                </div>
                <div class="mt-4">
                    <a class="text-sm font-medium text-green-600 hover:text-green-800" href="#">View all
                        customers</a>
                </div>
            </div>
        </div>

        <div class="rounded-lg bg-white p-6 shadow-md">
            <h2 class="mb-4 text-lg font-semibold text-gray-700">Recent Products</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                scope="col">Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                scope="col">Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                scope="col">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                scope="col">Stock</th>
                            <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                                scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                        <img class="h-10 w-10 rounded object-cover"
                                            src="https://images.unsplash.com/photo-1591315685611-fb7ece8c9b81?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                            alt="Product">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Crude Palm Oil</div>
                                    </div>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">Oil Products</td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">$120/barrel</td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">250 barrels</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <span
                                    class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">In
                                    Stock</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                        <img class="h-10 w-10 rounded object-cover"
                                            src="https://images.unsplash.com/photo-1591543620767-582b2e76369e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                            alt="Product">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Palm Kernel Oil</div>
                                    </div>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">Oil Products</td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">$150/barrel</td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">180 barrels</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <span
                                    class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">In
                                    Stock</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                        <img class="h-10 w-10 rounded object-cover"
                                            src="https://images.unsplash.com/photo-1605493725784-56651e4c7565?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                            alt="Product">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Palm Biodiesel</div>
                                    </div>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">Biofuel</td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">$200/barrel</td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">50 barrels</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <span
                                    class="inline-flex rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">Low
                                    Stock</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 flex-shrink-0">
                                        <img class="h-10 w-10 rounded object-cover"
                                            src="https://images.unsplash.com/photo-1591315685611-fb7ece8c9b81?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                            alt="Product">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Palm Olein</div>
                                    </div>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">Cooking Oil</td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">$180/barrel</td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">0 barrels</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <span
                                    class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">Out
                                    of Stock</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <a class="text-sm font-medium text-green-600 hover:text-green-800" href="#">View
                    all products</a>
            </div>
        </div>
    </section>
@endsection
