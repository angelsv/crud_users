<div class="row">

    <div class="col-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Nombre *</label>
            <input type="text" class="form-control" required id="firstname" name="firstname"
                aria-describedby="firstnameHelp" placeholder="John" value="{{ old('firstname', $user->firstname) }}">
                
            @error('firstname')
                <div id="firstnameHelp" class="form-text alert alert-warning p-0 m-0">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-6">
        <div class="mb-3">
            <label for="lastname" class="form-label">Apellido *</label>
            <input type="text" class="form-control" required id="lastname" name="lastname"
                aria-describedby="lastnameHelp" placeholder="Doe" value="{{ old('lastname', $user->lastname) }}">
            
            @error('lastname')
                <div id="lastnameHelp" class="form-text alert alert-warning p-0 m-0">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

<div class="row">

    <div class="col-6">
        <div class="mb-3">
            <label for="birthday" class="form-label">Fecha de Nacimiento *</label>
            <input type="date" class="form-control" max="{{ now()->toDateString() }}" format="yyyy-mm-dd" required
                id="birthday" name="birthday" aria-describedby="birthdayHelp" placeholder="1990-12-31"
                onchange="calcularEdad()"
                value="{{ old('birthday', $user->birthday) }}">
            
            @error('birthday')
                <div id="birthdayHelp" class="form-text alert alert-warning p-0 m-0">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-6">
        <div class="mb-3">
            <label for="birthday" class="form-label">Edad </label>
            <input type="text" class="form-control"
                id="age" readonly disabled
                placeholder="Seleccione primero una fecha de nacimiento"
                >
            {{-- <div id="birthdayHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
    </div>

</div>


<script>
    // Definir la función calcularEdad en el ámbito global
    function calcularEdad() {
        const birthdayInput = document.getElementById("birthday");
        const ageInput = document.getElementById("age");
        
        // Obtener la fecha de nacimiento del campo
        const fechaNacimiento = new Date(birthdayInput.value);
        const fechaActual = new Date();
        
        // Calcular la diferencia de años
        let edad = fechaActual.getFullYear() - fechaNacimiento.getFullYear();
        
        // Ajustar la edad si aún no ha llegado el cumpleaños este año
        if (fechaNacimiento.getMonth() > fechaActual.getMonth() || 
            (fechaNacimiento.getMonth() === fechaActual.getMonth() && 
             fechaNacimiento.getDate() > fechaActual.getDate())) {
            edad--;
        }
        
        // Mostrar la edad en el campo de edad
        ageInput.value = edad;
    }
    
    document.addEventListener("DOMContentLoaded", function() {
        // Calcular la edad cuando se carga la página si el campo de fecha de nacimiento no está vacío
        const birthdayInput = document.getElementById("birthday");
        if (birthdayInput.value) {
            calcularEdad();
        }
    });
</script>

