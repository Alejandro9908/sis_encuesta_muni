//validar si la fecha tiene el formato correcto
function validar_fecha(dato){
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    if(!dato.match(regEx)) return false;  // Invalid format
    var d = new Date(dato);
    if(Number.isNaN(d.getTime())) return false; // Invalid date
    return d.toISOString().slice(0,10) === dato;
}

//validar si un campo existe
function validar_dato_existe(dato){
    if(dato == ""){
        return false
    }else{
        return true
    }
}

//validar si un datos solo tiene numeros
function validar_dato_numero(dato){
    const regex = /^[0-9]*$/;
    return regex.test(dato); // true
}

//validar si un dato tiene formato de moneda
function validar_moneda(dato){
    const regex = /^(?!0\.00)[1-9]\d{0,2}(,\d{3})*(\.\d\d)?$/;
    return regex.test(dato); // true
}

//validar si un dato tiene solo letras
function validar_dato_letras(dato){
    const regex = /^[A-Z]+$/i;
    return regex.test(dato); // true
}







