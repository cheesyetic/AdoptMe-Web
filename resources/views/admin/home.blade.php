@extends('../layout/admintemplate')

@section('css')
<link rel="stylesheet" href="css/homeadmin.css">
@endsection

@section('title', 'Admin Home')

@section('container')

    <main>
        <div class="cards">

            <a href="{{ route('viewadmin') }}">
                <div class="card-single">
                    <div>
                        <h1>Admin</h1>
                        <span>Data Control</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('viewuser') }}">
                <div class="card-single">
                    <div>
                        <h1>User</h1>
                        <span>Data Control</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('viewproduct') }}">
                <div class="card-single">
                    <div>
                        <h1>Product</h1>
                        <span>Data Control</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('viewarticle') }}">
                <div class="card-single">
                    <div>
                        <h1>Article</h1>
                        <span>Data Control</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('viewpet') }}">
                <div class="card-single">
                    <div>
                        <h1>Adoption</h1>
                        <span>Data Control</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('viewreview') }}">
                <div class="card-single">
                    <div>
                        <h1>Review</h1>
                        <span>Data Control</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('viewcart') }}">
                <div class="card-single">
                    <div>
                        <h1>Cart-Checkout</h1>
                        <span>Data Control</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('viewtransaction') }}">
                <div class="card-single">
                    <div>
                        <h1>Transaction</h1>
                        <span>Data Control</span>
                    </div>
                </div>
            </a>
            
        </div>
    </main>

@endsection