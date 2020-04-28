@extends('layout.index')
@section('noidung')

 <div class="col-lg-6">
             <!-- Blog Post Content Column -->
           

                <!-- Blog Post -->

                <!-- Title -->
                <div>Luot xem: {{$chitiet->SoLuotXem}}</div>
                <div><?php
                if(Session::has('kt'.$chitiet->id))
                    echo(Session::get('kt'.$chitiet->id));
                ?></div>
                <h1>{{$chitiet->TieuDe}}</h1>

                <!-- Author -->
               
                <!-- Preview Image -->
                <img class="img-responsive" src="upload/tintuc/{{$chitiet->Hinh}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>{{$chitiet->created_at}}</p>
                <hr>

                <!-- Post Content -->
               
                {{$chitiet->NoiDung}}

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form method="Post" action="comment/{{$chitiet->id}}" role="form">
                    	<input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="Comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                @foreach($comment as $cm)
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="source_front/manse.jpg" height="120px" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cm->user->name}}
                            <small>{{$cm->created_at}}</small>
                       
                        </h4>
                       {{$cm->NoiDung}}
                    </div>
                </div>

                @endforeach
                <div class="clearfix"></div>

           		<div class="row">
           			{{$comment->links()}}
           		</div>

            <!-- Blog Sidebar Widgets Column -->
           
            </div>

@endsection