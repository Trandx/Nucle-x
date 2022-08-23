import axios from 'axios';
import authHeader from './auth-header';

const API_URL = process.env.VUE_APP_API_URL_RESSOURCE+'test/';

class UserService {
  getPublicContent() {
    return axios.get(API_URL + 'all');
  }

  getUserProfil() {
    return axios.get(API_URL + 'user', { headers: authHeader() });
  }

  getModeratorBoard() {
    return axios.get(API_URL + 'mod', { headers: authHeader() });
  }

  getAdminBoard() {
    return axios.get(API_URL + 'admin', { headers: authHeader() });
  }

  
}

export default new UserService();

  