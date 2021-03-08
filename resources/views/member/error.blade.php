@if ($errors->any())
                    <div>
                            @foreach ($errors->all() as $error)
                                @if($error == 'Success')
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{$error}}</strong> 
                                </div>
                                @else
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{$error}}</strong> 
                                </div>
                                @endif
                            @endforeach
                    </div>
                @endif
