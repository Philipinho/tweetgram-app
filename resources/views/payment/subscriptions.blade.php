@section('title', 'Invoices')

@include('partials.head')
@include("layouts.nav")

<div class="container" id="app">
    <h3 class="u-mt-small u-mb-medium">Subscription History</h3>
    <div class="row">
        <div class="col-12">
            <div class="c-table-responsive@wide">
                <table class="c-table">
                    <thead class="c-table__head">
                    <tr class="c-table__row">
                        <th class="c-table__cell c-table__cell--head">Invoice ID</th>
                        <th class="c-table__cell c-table__cell--head">Date</th>
                        <th class="c-table__cell c-table__cell--head">Amount</th>
                        {{--  <th class="c-table__cell c-table__cell--head">Start Date</th>
                          <th class="c-table__cell c-table__cell--head">Due Date</th>--}}
                        <th class="c-table__cell c-table__cell--head">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($invoices)

                        @foreach($invoices as $subscription)
                            <tr class="c-table__row">
                                <td class="c-table__cell">
                                    <a target="_blank" href="{{$subscription->paddle_receipt_url}}">Invoice
                                        #{{$subscription->paddle_order_id}}</a>
                                </td>
                                <td class="c-table__cell">
                                    <span class="c-badge c-badge--small c-badge--info">{{$subscription->paddle_event_time}}</span>
                                </td>
                                <td class="c-table__cell">${{$subscription->amount}}</td>
                                <td class="c-table__cell"><span class="badge badge-success">Paid</span></td>

                                {{--<td class="c-table__cell">{{explode(' ',$subscription->start_date)[0]}}</td>
                                <td class="c-table__cell">{{explode(' ',$subscription->end_date)[0]}}</td>--}}
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@include('partials.foot')
