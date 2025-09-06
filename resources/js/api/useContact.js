const token = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

export async function sendEmail(data) {
    const response = await fetch("/send-email", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            "X-CSRF-TOKEN": token,
        },
        body: JSON.stringify(data),
    });
    return response.json();
}
export async function fetchDepartments() {
    const response = await fetch("/api/departments");
    if (!response.ok) {
        throw new Error("Failed to fetch departments");
    }
    return response.json();
}

