                        @foreach($menu as $me)
                            @if($me['level'] == 1)
                                <div class="col-md-3" >  
                                <a href="{{$me['slug']}}" style=" text-decoration: none;color:black"><h6>{{$me['name']}}</h6></a>
                                @if($me['amount_childs'] > 0)
                                    @include('client.menu',['menu' =>$me['child']])
                                @endif
                                </div>
                            @elseif($me['level'] == 2)
                                <a class="dropdown-item " href="{{$me['slug']}}">{{$me['name']}}</a>
                            @endif                   
                        @endforeach