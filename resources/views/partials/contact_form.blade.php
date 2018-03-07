<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h1>Contact us</h1>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae commodi cum, debitis eaque error facere fugit, ipsa laboriosam natus non placeat quasi ratione tenetur voluptate voluptatibus, voluptatum! Accusantium animi dicta error eveniet ipsum molestias omnis optio porro quos sint.</p>

            <div id="contact">
                <p><i class="fa fa-2x fa-phone"></i> +381637479753</p>
                <p><i class="fa fa-2x fa-envelope"></i>mirkojosimovic1987@gmail.com</p>
                <p><i class="fa fa-2x fa-globe"></i>https://github.com/remirex</p>
                <p><i class="fa fa-2x fa-home"></i>Bulevar Oslobođenja 53, 11000 Beograd, Serbia</p>
            </div>
        </div>

        <div class="col-lg-6 contact">
            <h1>Questions? Go ahead, ask them</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Session::has('session_message'))
                <div class="alert alert-success"><em> {!! session('session_message') !!}</em></div>
            @endif

            <form style="margin-top: 20px" action="{{ route('send.mail') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <textarea name="text_msg" class="form-control" rows="10" placeholder="Type some text.."></textarea>
                </div>
                <div class="form-group">
                    <button type="submit"  class="button">Send a Message</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- /.contact -->