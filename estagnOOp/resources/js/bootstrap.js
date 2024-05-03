// Importando o Axios para realizar requisições HTTP
import axios from 'axios';
// Tornando o Axios acessível globalmente através do objeto window
window.axios = axios;
// Definindo o cabeçalho comum para todas as requisições Axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
