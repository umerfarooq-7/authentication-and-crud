<div>
<form wire:submit.prevent="store">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" wire:model="name" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                  </div>
                  @error('name') <span class="text-danger">{{$message}}</span>  @enderror
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" wire:model="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  @error('email') <span class="text-danger">{{$message}}</span>  @enderror
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" wire:model="pass" class="form-control" id="exampleInputPassword1">
                  </div>
                  @error('pass') <span class="text-danger">{{$message}}</span>  @enderror
                  <div class="mb-4">
                  <label for="exampleInputRole" class="form-label">Role</label>
                  <select name="" id="" wire:model="role" class="form-control">
                    <option value="" selected disabled>Select Role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}">{{ucfirst($role->role)}}</option>
                    @endforeach
                  </select>

                  </div>
                  @error('role') <span class="text-danger">{{$message}}</span>  @enderror
                  <button type="submit"  class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Create User</button>
               
                </form>
</div>