import { Outlet } from '@tanstack/react-router';

const Todos = () => {
    return (
        <div>
            <h1>Todo List</h1>
            <Outlet />
        </div>
    );
};

export default Todos;
