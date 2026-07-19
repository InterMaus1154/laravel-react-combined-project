import { api } from './client';

export const logout = () => api.post('/logout');
