const categoriesURL = '/api/categories';
const familiesURL = '/api/families';

// Fetch categories from the API
export async function fetchCategories() {
    const response = await fetch(categoriesURL);
    if (!response.ok) {
        throw new Error('Failed to fetch products');
    }
    return await response.json();
}

// Fetch families from the API
export async function fetchFamilies(){
    const response = await fetch(familiesURL);
    if (!response.ok) {
        throw new Error('Failed to fetch categories');
    }
    return await response.json();
}