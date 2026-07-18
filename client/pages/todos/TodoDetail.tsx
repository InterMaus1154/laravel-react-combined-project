import { todoDetailRoute } from '../../routes/todos';

const TodoDetail = () => {
    const { todoId } = todoDetailRoute.useParams();

    return <div>todo id: {todoId}</div>;
};

export default TodoDetail;
