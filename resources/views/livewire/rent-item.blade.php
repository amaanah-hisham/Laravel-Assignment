<div>
    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
    <div class="detail-extralink">
{{--        <div class="detail-qty border radius">--}}
{{--            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>--}}
{{--            <span class="qty-val">1</span>--}}
{{--            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>--}}
{{--        </div>--}}
        <div class="product-extra-link2">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @guest
                <div class="alert alert-info text-primary w-100">
                    Login to rent this item
                </div>

            @endguest

            @auth


            <form wire:submit.prevent="save">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Borrowing Date</label>
                        <input type="date" class="form-control @error('borrowing_date') is-invalid @enderror" wire:model="borrowing_date" wire:change="calculateAmount">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Returning Date</label>
                        <input type="date" class="form-control @error('returning_date') is-invalid @enderror" wire:model="returning_date"  wire:change="calculateAmount">

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <table class="table ">
                            <tr>
                                <th>Days Borrowing:</th>
                                <td>{{ $days_count }}</td>
                            </tr>
                            <tr>
                                <th>Total Amount:</th>
                                <td>{{ $amount }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label for="mobileNumber">Mobile Number:</label>
                    <input type="text" class="form-control" id="mobileNumber" wire:model="mobileNumber" name="mobileNumber">
                </div>

                <script>
                    document.getElementById('mobileNumber').addEventListener('input', function(event) {
                        // Remove non-numeric characters from the input value
                        this.value = this.value.replace(/\D/g, '');
                    });
                </script>

                <div class="form-group">
                    <label for="nic">NIC (National Identity Card):</label>
                    <input type="text" class="form-control" id="nic" wire:model="nic" name="nic">
                </div>


                <button type="submit" class="button button-add-to-cart" wire:loading.attr="disabled">
                    Request to Rent
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" wire:loading></span>
                </button>

            </form>

                @endauth

                <br>
            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
            <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
        </div>
    </div>
</div>
