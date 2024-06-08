import axios from 'axios';
// import { useUserStore } from '../store/userStore';

const API_BASE_URL = import.meta.env.API_BASE_URL ;
// const userStore = useUserStore();
const apiService = axios.create({
  baseURL: API_BASE_URL,
  headers: {
    "Content-Type": "application/json",
    // "Authorization": userStore.accessToken ? `Bearer ${userStore.accessToken}` : '',
  },
});

apiService.interceptors.request.use((config) => {
  const csrfToken = document.querySelector('meta[name="csrf-token"]');

  if (csrfToken) {
    const token = csrfToken.getAttribute("content");

    if (token) {
      config.headers["X-CSRF-TOKEN"] = token;
    }
  }

  return config;
});



export default apiService;
