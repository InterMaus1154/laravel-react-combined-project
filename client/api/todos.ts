import { api } from './client';
import type { LaravelPagination } from '../types/__types';
import type { ApiTodo } from '../types/todo';
import { todoFromApi } from '../mappers/todo';

export const fetchPaginatedTodos = async (page: number) => {
    const { data } = await api.get<LaravelPagination<ApiTodo>>('/todos', {
        params: { page: page },
    });
    return {
        ...data,
        data: data.data.map(todoFromApi),
    };
};
