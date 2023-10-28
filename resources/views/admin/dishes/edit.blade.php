@extends('layouts.app')

@section('content')
						<form action="{{ route('admin.dishes.update', $dish->slug) }}" method="POST" enctype="multipart/form-data">
							@csrf
                            @method('PUT')
							<div class="">
								<input type="hidden" name="user_id" value="{{ Auth::id() }}">
								{{-- NAME INPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="name">Nome *</label>

									<div class="col-md-6">
										<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
											value="{{ $dish->name }}" required>

										@error('name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								{{-- //NAME IMPUT --}}

								{{-- Descrizione IMPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="description">Descrizione</label>

									<div class="col-md-6">

										<textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"  required>{{ $dish->description }}</textarea>

										@error('description')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								{{-- //Descrizione IMPUT --}}

								{{-- Ingredienti IMPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="ingredients">Ingredienti</label>

									<div class="col-md-6">
										<input id="ingredients" type="text" min="1" max="11"
											class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" value="{{ $dish->ingredients }}" required>

										@error('ingredients')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								{{-- //ingredienti IMPUT --}}

                                {{-- Prezzo Input --}}

                                <div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="price">Prezzo</label>

									<div class="col-md-6">
										<input id="price" type="number" min="0" step="0.01"
											class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required > 
										
										

										@error('price')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror

									</div>
								</div>

                                {{-- /Prezzo input --}}

                                {{-- IMAGES INPUT --}}
                                <div class="m-4 d-flex align-items-center row ">
                                    <div class="form-group py-3 d-flex flex-column">
                                        <label class="text-uppercase fw-bold" for="image">Scegli foto *</label>
                                        <input class="py-2" type="file" class="form-control" id="image" name="image">
                                        <div id="image-validation-message"></div>
                                    </div>
                                </div>
                                {{-- //IMAGES INPUT --}}
                                <div class="m-4 d-flex align-items-center row ">
                                    <div class="d-flex">
                                        <button id="submit" type="submit" class="btn btn-primary">Edit dish</button>
                                        <a href="{{ route('admin.dishes.index') }}" class="btn btn-danger ms-3">Go to back</a>
                                    </div>
                                </div>
							</div>
				        </form>
@endsection