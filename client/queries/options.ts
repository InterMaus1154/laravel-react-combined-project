import { queryOptions } from '@tanstack/react-query';
import { TODO_ALL_KEY } from './constants';
import { fetchTodos } from '../api/todos';

export const todoAllQueryOptions = queryOptions({
    queryKey: TODO_ALL_KEY,
    queryFn: fetchTodos,
});
