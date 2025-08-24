<template>
    <div class="container-fluid custom-container">
        <div class="container">
            <div class="intro-text text-white">
                <div class="custom-header-text mt-4">
                    Especialistas en Suspensión, Dirección y Tracción Automotriz
                </div>
                <div class="text-uppercase custom-subtitle-text">
                    Desde 1980
                </div>
                <router-link
                    class="btn btn-primary custom-btn text-uppercase text-white"
                    to="/services"
                >
                    Ver más
                </router-link>
            </div>
        </div>
    </div>
</template>

<style scoped>
.custom-container {
    /* height: 800px; */
    background-image: url("../images/Govi2023.jpg");
    background-size: cover;
    background-position: center;
    text-align: center;
}
.intro-text {
    padding-top: 200px;
    padding-bottom: 100px;
}
@media (min-width: 768px) {
    .intro-text {
        padding-top: 300px;
        padding-bottom: 200px;
    }
    .custom-header-text {
        font-size: 2.5rem !important;
        margin-top: 0px !important;
    }
    .custom-subtitle-text {
        font-size: 5rem !important;
    }
}
.custom-header-text {
    font-size: 1.5rem;
    margin-bottom: 20px;
    font-family: "Playfair Display", serif;
    font-style: italic;
}
.custom-subtitle-text {
    font-size: 3rem;
    margin-bottom: 30px;
    font-weight: 700;
}
.custom-btn {
    padding: 20px 40px;
    font-weight: 700;
}
</style>
