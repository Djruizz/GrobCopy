
export async function fetchLocations(){
    const response  = await fetch('api/location-groups');
    if(!response.ok){
        throw new Error("Error al hacer fetch de locatio groups");
    }else{
        return response.json();
    }
} 