import { Outlet, useNavigate } from '@tanstack/react-router';
import { useQuery } from '@tanstack/react-query';
import type { Todo } from '../../types/todo';
import { todoRoute } from '../../routes/todos';
import { todosQueryOptions } from '../../queries/options';
import { cn } from '../../utils/cn';

const Todos = () => {
    const { page } = todoRoute.useSearch();
    const navigate = useNavigate({ from: todoRoute.fullPath });
    const { data: todos, isLoading } = useQuery(todosQueryOptions(page));

    const goToNextPage = (page: number) => {
        navigate({ search: { page: page } });
    };

    if (isLoading) {
        return <div>Loading..</div>;
    }

    return (
        <div>
            <h1>Todo List</h1>
            {todos?.data.map((todo: Todo) => (
                <div key={todo.id}>{todo.title}</div>
            ))}
            <div className="flex gap-2">
                {todos &&
                    Array.from(
                        { length: todos.last_page },
                        (_, i) => i + 1,
                    ).map((n) => (
                        <button
                            className={cn(
                                'w-8 h-8 p-2 flex justify-center items-center aspect-square bg-purple-400 hover:bg-purple-300 cursor-pointer rounded-sm text-white',
                                n === todos.current_page
                                    ? 'bg-purple-800 cursor-not-allowed'
                                    : '',
                            )}
                            key={n}
                            disabled={n == todos.current_page}
                            onClick={() => {
                                goToNextPage(n);
                            }}
                        >
                            {n}
                        </button>
                    ))}
            </div>
            <Outlet />
        </div>
    );
};

export default Todos;
