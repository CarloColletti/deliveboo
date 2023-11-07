@extends('layouts.app')

@section('content')
						<form action="{{ route('admin.restaurants.update', $restaurant->slug) }}" method="POST" enctype="multipart/form-data">
							@csrf
                            @method('PUT')
							<div class="">
								<input type="hidden" name="user_id" value="{{ Auth::id() }}">
								{{-- NAME INPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="name">Nome *</label>

									<div class="col-md-6">
										<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
											value="{{ $restaurant->name }}" required>

										@error('name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								{{-- //NAME IMPUT --}}

								{{-- ADDRESS IMPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="address">Indirizzo *</label>

									<div class="col-md-6">

										<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"
											value="{{ $restaurant->address }}" required>

										@error('address')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								{{-- //ADDRESS IMPUT --}}

								{{-- PIVA IMPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="piva">Partita IVA *</label>

									<div class="col-md-6">
										<input id="piva" type="text" min="1" max="11"
											class="form-control @error('piva') is-invalid @enderror" name="piva" value="{{ $restaurant->piva }}" required>

										@error('piva')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								{{-- //PIVA IMPUT --}}

                                {{-- IMAGES INPUT --}}
                                <div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="piva">Scegli foto</label>

									<div class="col-md-6">
										<input id="photo" type="file" 
											class="form-control @error('photo') is-invalid @enderror" name="photo">

										@error('photo')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
                                {{-- //IMAGES INPUT --}}
                                <div class="m-4 d-flex align-items-center row ">
                                    <div class="d-flex">
                                        <button id="submit" type="submit" class="btn btn-primary">Edit restaurant</button>
                                        <a href="{{ route('admin.restaurants.index') }}" class="btn btn-danger ms-3">Go to back</a>
                                    </div>
                                </div>
							</div>
				        </form>
@endsection