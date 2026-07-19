export const todoKeys = {
    all: ['todos'] as const,
    lists: () => [...todoKeys.all, 'list'] as const,
    list: (page: number) => [...todoKeys.lists(), { page }] as const,
    detail: (todoId: number) =>
        [...todoKeys.all, 'detail', { todoId }] as const,
};
