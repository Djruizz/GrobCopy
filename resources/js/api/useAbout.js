const aboutURL = '/api/about';

export async function fetchAboutTimelineItems() {
    const response = await fetch(aboutURL);
    if (!response.ok) {
        throw new Error('Failed to fetch services');
    }
    return await response.json();
}