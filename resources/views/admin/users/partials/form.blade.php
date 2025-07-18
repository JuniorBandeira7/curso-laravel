<x-alert/>
@csrf()
<!-- $user->name ?? old('name') = se nao tiver $user->name bota old('name') -->
<input type="text" name="name" id="" placeholder="Nome" value="{{ $user->name ?? old('name')  }}">
<input type="email" name="email" id="" placeholder="Email" value="{{ old('email') }}">
<input type="password" name="password" id="" placeholder="Senha">
<button type="submit">Enviar</button>
