import { Outlet } from '@tanstack/react-router';
import { useQuery } from '@tanstack/react-query';
import { fetchTodos } from '../../api/todos';
import type { Todo } from '../../types/todo';

const Todos = () => {
    const { data: todos, isLoading } = useQuery({
        queryKey: ['todos'],
        queryFn: fetchTodos,
    });

    if (isLoading) {
        return <div>Loading..</div>;
    }

    return (
        <div>
            <h1>Todo List</h1>
            {todos?.data.map((todo: Todo) => (
                <div key={todo.id}>{todo.title}</div>
            ))}
            <Outlet />
        </div>
    );
};

export default Todos;
