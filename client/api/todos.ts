import { api } from './client';
import type { LaravelPagination } from '../types/__types';
import type { ApiTodo } from '../types/todo';
import { todoFromApi } from '../mappers/todo';

export const fetchTodos = async () => {
    const { data } = await api.get<LaravelPagination<ApiTodo>>('/todos');
    return {
        ...data,
        data: data.data.map(todoFromApi),
    };
};
