import { keepPreviousData, queryOptions } from '@tanstack/react-query';
import { fetchPaginatedTodos } from '../api/todos';
import { todoKeys } from './keys';

export const todosQueryOptions = (page: number) =>
    queryOptions({
        queryKey: todoKeys.list(page),
        queryFn: () => fetchPaginatedTodos(page),
        placeholderData: keepPreviousData,
    });
