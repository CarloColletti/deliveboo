@extends('layouts.app')

@section('content')
					<div class="form-container">

						<form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="">
								<input type="hidden" name="user_id" value="{{ Auth::id() }}">
								{{-- TYPE INPUT --}}

								<div class="mb-3">
									<label for="type_id"></label>
									<select class="form-control m-4  @error('type_id') is-invalid @enderror" type="text" name="type_id" id="type_id" placeholder="Inserisci il tipo di progetto">
										<option value="">Scegli una tipologia di ristorante</option>
						
										@foreach ($types as $type)
											<option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : ''}}>{{$type->name}}</option>
										@endforeach
									</select>
						
									@error('type_id')
										<div class="invalid-feedback">
											{{$message}}
										</div>
									@enderror
								</div>

								{{-- /TYPE INPUT --}}
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

								{{-- ADDRESS IMPUT --}}
								<div class="m-4 d-flex align-items-center row ">
									<label class="text-uppercase fw-bold" for="address">Indirizzo *</label>

									<div class="col-md-6">

										<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"
											value="{{ old('address') }}" required>

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
											class="form-control @error('piva') is-invalid @enderror" name="piva" value="{{ old('piva') }}" required>

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
                                    <div class="form-group py-3 d-flex flex-column">
                                        <label class="text-uppercase fw-bold" for="photo">Scegli foto *</label>
                                        <input class="py-2" type="file" class="form-control" id="photo" name="photo" required>
                                        <div id="image-validation-message"></div>
                                    </div>
                                </div>
                                {{-- //IMAGES INPUT --}}
                                <div class="m-4 d-flex align-items-center row ">
                                    <div class="d-flex">
                                        <button id="submit" type="submit" class="btn btn-primary">Add new restaurant</button>
                                        <a href="{{ route('admin.restaurants.index') }}" class="btn btn-danger ms-3">Go to back</a>
                                    </div>
                                </div>
							</div>
				        </form>
					</div>
@endsection