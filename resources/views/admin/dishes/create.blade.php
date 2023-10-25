@extends('layouts.app')

@section('content')
						<form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data" class="mt-5">
							@csrf
							<div class="">
								<input type="hidden" name="user_id" value="{{ Auth::id() }}">
								{{-- NAME INPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="name">Nome *</label>

									<div class="col-md-6">
										<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
											value="{{ old('name') }}" required>

										@error('name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								{{-- //NAME IMPUT --}}

								{{-- Description IMPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="description">Descrizione</label>

									<div class="col-md-6">

										<textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"
											value="{{ old('description') }}" required>
                                        
                                        </textarea>    

										@error('description')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								{{-- //description IMPUT --}}

								{{-- ingredinti IMPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="ingredients">ingredienti</label>

									<div class="col-md-6">
										<textarea id="ingredients" type="text"
											class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" value="{{ old('ingredients') }}" required > 
                                        </textarea>
                                        

										@error('ingredients')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror

									</div>
								</div>
								{{-- //ingredients IMPUT --}}

								{{-- Price INPUT --}}

								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="price">Prezzo</label>

									<div class="col-md-6">
										<input id="price" type="number" min="0"
											class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required > 
										
										

										@error('price')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror

									</div>
								</div>

								{{-- /PRICE INPUT --}}
                                {{-- IMAGES INPUT --}}
                                <div class="m-4 d-flex align-items-center row ">
                                    <div class="form-group py-3 d-flex flex-column">
                                        <label class="text-uppercase fw-bold" for="image">Scegli foto *</label>
                                        <input class="py-2" type="file" class="form-control" id="image" name="image" required>
                                        <div id="image-validation-message"></div>
                                    </div>
                                </div>
                                {{-- //IMAGES INPUT --}}




								
                                <div class="m-4 d-flex align-items-center row ">
                                    <div class="d-flex">
                                        <button id="submit" type="submit" class="btn btn-primary">Add new Dish</button>
                                        <a href="#" class="btn btn-danger ms-3">Go to back</a>
                                    </div>
                                </div>
							</div>
				        </form>
@endsection