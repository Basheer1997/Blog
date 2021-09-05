@extends('layout')
@section('content')

<div class="container">
<br><br>


    @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
    @endif

    @if(session()->has('messages'))
        <div class="alert alert-danger">
            {{ session()->get('messages') }}
        </div>
   @endif

 {{--    <nav class="navbar navbar-light bg-light" style="background-color: black;height: 50px;">

      <a class="navbar-brand" href="#" style="color: white;">Posts</a>
      <a class="navbar-brand" href="#" style="color: white;">Categories</a>
      <a class="navbar-brand" href="#" style="color: white;">Tags</a>
      <a class="navbar-brand" href="#" style="color: white;">Comments</a>
      <a class="navbar-brand" href="#" style="color: white;margin-left: 250px;">Login</a>
      <a class="navbar-brand" href="#" style="color: white;">Register</a>
      <form class="form-inline"> --}}
        {{--   <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="margin-left: 20px;margin-top: 7px;">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-top: 7px;">Search</button>
        </form> --}}

        @foreach ($posts as $post)
        _______________________________________________________________________________________________________________________________________________
        <div class="form-group">
            <label for="">Auther : {{$post->user->name}}</label>
            <br>
            <label for="">Title : {{$post->title}}</label>


            <br>
            Category :<small style="color:blue">{{$post->category->name}}</small>
            Tags :
            @foreach ($post->tags as $item)
            <small style="color:blue">{{$item->name}},</small>
            @endforeach
            <textarea class="form-control" name="" id="" rows="3" disabled>{{$post->body}}</textarea>


       {{--      <small style="color: blue;margin-left: 5px;"><a href="{{route('like',$post->id)}}" type="button"
                class="btn" and style="background-color:transparent;color:blue" >
                {{$post->like ? 'you liked this post' : 'like'}}</a></small> --}}

              {{--   <form action="{{route('like',$post->id)}}" method="post">
                    @csrf
                    @if($post->Like())
                    <button class="btn" type="submit">Like</button>
                    @else
                    <button class="btn" type="submit">Unlile</button>
                    @endif
                    </form> --}}


            <small style="color: blue;margin-left: 5px;"><a href="{{route('posts.show',$post->id)}}" class="btn" and style="background-color:transparent;color:blue" >Show Comments</a></small>






            <small style="color: blue;margin-left: 5px;"><button type="button" class="btn"
                data-toggle="modal" data-target="#editPost{{$post->id}}"
                style="background-color:transparent;float: right;margin-right: 50px;">Edit</button></small>

                <small style="color: red;margin-left: 5px;"><button class="btn" and
                    data-toggle="modal" data-target="#deletePost{{$post->id}}"
                        style="background-color:transparent;float: right">Delete</button></small>

                        <small style="color: blue;margin-left: 5px;"><a href="{{route('post.publish',$post->id)}}"
                            type="button" class="btn" style="background-color:transparent;float: right;">
                            {{$post->published ? 'Unpublished' : 'Published'}}</a></small>
          </div>

          {{-- ###########################   Delete Post    ############################# --}}
          <div class="modal fade" id="deletePost{{$post->id}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                           id="exampleModalLabel">Are you sure you want to delete this post??

                       </h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <!-- add_form -->
                       <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                           @csrf
                           @method('delete')

                           <div class="form-group">
                               <label
                                   for="exampleFormControlTextarea1">
                                   </label>
                               <textarea class="form-control" name="name" id="exampleFormControlTextarea1"
                                         rows="3" placeholder="Add your category">{{$post->body}}</textarea>
                           </div>
                           <br><br>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">close</button>
                       <button type="submit"
                               class="btn btn-success">Yes</button>
                   </div>
                   </form>

               </div>
            </div>
            </div>




          {{-- ###########################   Edit Post    ############################# --}}



          <div class="modal fade" id="editPost{{$post->id}}" role="dialog">
          <div class="modal-dialog">

      <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Post</h4>
              </div>


              <form
              method="POST"
              action="{{route('posts.update',$post->id)}}"
              accept-charset="UTF-8"
              class="form-horizontal"
              role="form"
            >
            @csrf
            @method("PUT")
              <div class="form-group">
                <label for="title" class="col-md-2 control-label"
                  >Title</label
                >

                <div class="col-md-8">
                  <input
                    class="form-control"
                    required="required"
                    autofocus="autofocus"
                    name="title"
                    type="text"
                    id="title"
                    value="{{$post->title}}"
                  />

                  <span class="help-block">
                    <strong></strong>
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label for="body" class="col-md-2 control-label"
                  >Body</label
                >

                <div class="col-md-8">
                  <textarea
                    class="form-control"
                    required="required"
                    name="body"
                    cols="50"
                    rows="10"
                    id="body"
                  >{{$post->body}}</textarea>

                  <span class="help-block">
                    <strong></strong>
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label for="category_id" class="col-md-2 control-label"
                  >Category</label
                >

                <div class="col-md-8">
                  <select
                    class="form-control"
                    required="required"
                    id="category_id"
                    name="category_id"
                    >
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{$post->category_id==$category->id ? "selected" : ""}}>{{$category->name}}</option>
                    @endforeach

                    </select
                  >

                  <span class="help-block">
                    <strong></strong>
                  </span>
                </div>
              </div>

              <div class="form-group">
                  <label for="tag_id" class="col-md-2 control-label"
                    >Tags</label
                  >

                  <div class="col-md-8">
                    <select
                      class="form-control"
                      required="required"
                      id="tag_id"
                      name="tag_id[]"
                      multiple
                      >
                      @foreach ($tags as $tag)
                      <option value="{{$tag->id}}"
                        @foreach ($post->tags as $item)
                            {{$tag->id==$item->id ? "selected" : ""}}
                        @endforeach
                        >{{$tag->name}}</option>
                      @endforeach

                      </select
                    >

                    <span class="help-block">
                      <strong></strong>
                    </span>
                  </div>
                </div>




              <div class="modal-footer">

                  <button type="button" class="btn btn-secondary"
                  data-dismiss="modal">close</button>
          <button type="submit"
                  class="btn btn-success">update</button>
              </div>
            </div>
          </div>
      </form>
            </div>

        @endforeach










        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPost" style="background-color: black;float: right;margin-right: 50px;">Add Post</button>




        <div class="modal fade" id="addPost" role="dialog">
        <div class="modal-dialog">

    <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">New Post</h4>
            </div>


            <form
            method="POST"
            action="{{route('posts.store')}}"
            accept-charset="UTF-8"
            class="form-horizontal"
            role="form"
          >
          @csrf
            <div class="form-group">
              <label for="title" class="col-md-2 control-label"
                >Title</label
              >

              <div class="col-md-8">
                <input
                  class="form-control"
                  required="required"
                  autofocus="autofocus"
                  name="title"
                  type="text"
                  id="title"
                />
                {{-- <input type="hidden" name="published"> --}}

                <span class="help-block">
                  <strong></strong>
                </span>
              </div>
            </div>

            <div class="form-group">
              <label for="body" class="col-md-2 control-label"
                >Body</label
              >

              <div class="col-md-8">
                <textarea
                  class="form-control"
                  required="required"
                  name="body"
                  cols="50"
                  rows="10"
                  id="body"
                ></textarea>

                <span class="help-block">
                  <strong></strong>
                </span>
              </div>
            </div>

            <div class="form-group">
              <label for="category_id" class="col-md-2 control-label"
                >Category</label
              >

              <div class="col-md-8">
                <select
                  class="form-control"
                  required="required"
                  id="category_id"
                  name="category_id"
                  >
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach

                  </select
                >

                <span class="help-block">
                  <strong></strong>
                </span>
              </div>
            </div>

            <div class="form-group">
                <label for="tag_id" class="col-md-2 control-label"
                  >Tags</label
                >

                <div class="col-md-8">
                  <select
                    class="form-control"
                    required="required"
                    id="tag_id"
                    name="tag_id[]"
                    multiple
                    >
                    @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach

                    </select
                  >

                  <span class="help-block">
                    <strong></strong>
                  </span>
                </div>
              </div>




            <div class="modal-footer">

                <button type="button" class="btn btn-secondary"
                data-dismiss="modal">close</button>
        <button type="submit"
                class="btn btn-success">add</button>
            </div>
          </div>
        </div>
    </form>
          </div>

  </div>

@endsection
