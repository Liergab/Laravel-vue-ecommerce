import { defineStore } from 'pinia'

function loadFromLocalStorage() {
    const storedData = localStorage.getItem('user');
    return storedData ? JSON.parse(storedData) : null;
  }

export const useUserStore = defineStore('users', {

    state: () => ({
        user: loadFromLocalStorage(),
      }),
      actions: {
        login(userData) {
          this.user = userData;
          localStorage.setItem('user', JSON.stringify(userData));
        },
        logout() {
          this.user = null;
          localStorage.removeItem('user');
        },
      },
      getters: {
        isLoggedIn: (state) => !!state.user,
      },
  
})