import axios from 'axios';
import { Dropdown, initMDB } from "mdb-ui-kit";

initMDB({ Dropdown });
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
