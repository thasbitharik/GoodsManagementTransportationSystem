<div>
    <section class="mt-5 mb-5">
        <div class="container">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="p-4">
                        <h2>Dispatched History</h2>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Tracking Number</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($goods as $item)
                                <tr>
                                    <td>{{ $item->customer_fname }}</td>
                                    <td>{{ $item->tracking_number }}</td>
                                    <td><a type="button" href="/tracking/{{ $item->id }}" class="btn btn-sm">Track</a></td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
