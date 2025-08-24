<template>
    <footer class="footer bg-light p-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center">
                    <span class="copyright">
                        Copyright © GRUPO GOVI -
                        <span>{{ year }}</span>
                    </span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline text-center social-buttons m-4">
                        <li
                            v-for="social in socials"
                            :key="social.name"
                            class="list-inline-item"
                        >
                            <a
                                :href="social.url"
                                target="_blank"
                                class="align-middle text-center"
                            >
                                <Icon
                                    :name="social.name"
                                    :customParameters="iconParameters"
                                />
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 text-center">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item">
                            <a
                                href="#AvisoPrivacidad"
                                data-bs-toggle="modal"
                                data-bs-target="#avisoPrivacidad"
                            >
                                Aviso de Privacidad
                            </a>
                        </li>
                    </ul>
                    <div
                        class="modal fade"
                        id="avisoPrivacidad"
                        tabindex="-1"
                        aria-labelledby="AvisoPrivacidadLabel"
                        aria-hidden="true"
                    >
                        <div
                            class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                        >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title text-center"
                                        id="AvisoPrivacidadLabel"
                                    >
                                        AVISO DE PRIVACIDAD
                                    </h5>
                                    <button
                                        type="button"
                                        class="close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-justify">
                                        De conformidad con la Ley Federal de
                                        Protección de Datos Personales en
                                        Posesión de Particulares, se emite el
                                        presente Aviso de Privacidad (en lo
                                        sucesivo “el Aviso”) de las empresas
                                        Govi Refaccionaria S.A. de C.V.,
                                        Suspensiones GR S.A. de C.V., Govi San
                                        Nicolás S.A. de C.V., Govi La Fe S.A. de
                                        C.V., Govi Chapultepec S.A. de C.V. y
                                        Govi Refaccionaria No 2 S.A. de C.V.
                                        (cualquiera en lo sucesivo “Govi” o
                                        “Empresa”), todas con domicilio en el
                                        cual se mantienen los datos personales
                                        de Libramiento Noreste #9239, Parque
                                        Industrial Mitras, García, N.L.
                                    </p>
                                    <div>
                                        <h6 class="text-left">Finalidad</h6>
                                        <p class="text-justify">
                                            La información de clientes,
                                            proveedores y empleados que recaba
                                            Govi por medio de usted o a través
                                            de un tercero por los diferentes
                                            medios, tales como electrónicos, a
                                            través de correo electrónico de
                                            nuestros empleados, o mediante la
                                            página web de la Empresa; por
                                            entrega física a cualquiera de
                                            nuestros empleados en cualquiera de
                                            nuestras Sucursales, Centros de
                                            Distribución o mediante la consulta
                                            de datos en sitios públicos, será
                                            debidamente resguardada en nuestras
                                            bases de datos con el fin de
                                            proteger la privacidad de las
                                            personas que las proporcionaron. La
                                            información recabada por la Empresa
                                            será utilizada estrictamente para
                                            los fines de la misma, tales como
                                            estudios para el otorgamiento de
                                            crédito, encuestas de calidad en el
                                            servicio, confirmaciones de saldos,
                                            alta de cuentas bancarias para pago
                                            a proveedores, estudio de empleados
                                            y candidatos a los diferentes
                                            puestos de trabajo de nuestra
                                            Empresa, avisos de interés de la
                                            Empresa y promoción de artículos
                                            para la venta.
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="text-left">
                                            Datos solicitados
                                        </h6>
                                        <p class="text-justify">
                                            La información solicitada por la
                                            empresa es variada y consiste entre
                                            otros datos en: Nombre, RFC, CURP,
                                            teléfono fijo y/o celular,
                                            dirección, IFE (o alguna otra
                                            identificación como pasaporte o
                                            licencia), documentación que ampare
                                            la situación jurídica, estados de
                                            cuenta bancarios, referencias
                                            personales y comerciales, y en
                                            general cualquier otra documentación
                                            que la Empresa requiera como
                                            requisito para el otorgamiento de
                                            créditos, para el alta como empleado
                                            de la Empresa o para realizar pagos
                                            a proveedores.
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="text-left">
                                            Modificaciones del Aviso
                                        </h6>
                                        <p class="text-justify">
                                            La Empresa se reserva el derecho de
                                            realizar modificaciones al presente
                                            Aviso de Privacidad en base a las
                                            Leyes aplicables en el momento, así
                                            como a las políticas internas de la
                                            Empresa, cuidando en todo momento la
                                            privacidad y confidencialidad de la
                                            información.
                                        </p>
                                    </div>
                                    <div>
                                        <h6 class="text-left">
                                            Limitación de la información
                                            proporcionada
                                        </h6>
                                        <p class="text-justify">
                                            La persona que haya proporcionado
                                            información a la Empresa, tiene el
                                            derecho a acceder, ratificar,
                                            cancelar sus datos personales,
                                            oponerse al tratamiento de los
                                            mismos y revocar el consentimiento
                                            que para dicho fin nos haya
                                            otorgado; esto se deberá hacer
                                            mediante comunicado por escrito que
                                            deberá presentarse en el domicilio
                                            de la Empresa mencionado
                                            anteriormente, en el departamento de
                                            Recursos Humanos.
                                        </p>
                                        <br />
                                        <p class="text-left font-italic">
                                            Fecha última actualización: 02/2021
                                        </p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button
                                        type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal"
                                    >
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
import Icon from "../components/Icon.vue";

const iconParameters = {
    fill: "currentColor",
    stroke: "none",
};

const year = new Date().getFullYear();

const socials = [
    { name: "twitter", url: "https://x.com/suspensiongrob" },
    { name: "facebook", url: "https://www.facebook.com/suspensiongrob" },
];
</script>

<style scoped>
.social-buttons li a {
    font-size: 20px;
    line-height: 50px;
    display: block;
    width: 50px;
    height: 50px;
    transition: all 0.3s;
    color: white;
    border-radius: 100%;
    outline: none;
    background-color: #212529;
}
.social-buttons li a:hover {
    background-color: var(--bs-primary);
    color: white;
}
.quicklinks {
    font-size: 90%;
    line-height: 40px;
    margin-bottom: 0;
    text-transform: none;
}
.close {
    float: right;
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: 0.5;
    background-color: transparent;
    border: 0;
    -webkit-appearance: none;
    appearance: none;
    margin-left: auto;
}
</style>
