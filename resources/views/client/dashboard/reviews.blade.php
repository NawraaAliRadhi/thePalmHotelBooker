@extends("client.dashboard.layouts.main")

@section("content")
            <div class="dashboard-content">
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-xs-12 traffic">
                     <div class="dashboard-list-box">
                        <h4 class="gray">My reviews</h4>
                        <div class="table-box">
                           <table class="basic-table">
                              <thead>
                                 <tr>
                                    <th>Date</th>
                                    <th>Room</th>
                                    <th>Rating</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                @foreach ($reviews as $review)
                                <tr>
                                    <td>{{$review->created_at->format("d, M Y")}}</td>
                                    <td class="t-id">{{$review->room->name}}</td>
                                    <td class="t-id">{{$review->rating}} star review</td>
                                    <td>
                                        <a class="btn btn-primary" href="/dashboard/add-review/{{$review->room->id}}">view this review</a>
                                    </td>
                                 </tr>
                                @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
@endsection
