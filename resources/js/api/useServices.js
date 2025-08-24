const URL = '/api/services';

export async function fetchServices() {
    const response = await fetch(URL);
    if (!response.ok) {
        throw new Error('Failed to fetch services');
    }
    return await response.json();
}