var json = "";

export async function loadJSON(__loc) {
    const response = await fetch(__loc);
    json = await response.json();

    return json;
}