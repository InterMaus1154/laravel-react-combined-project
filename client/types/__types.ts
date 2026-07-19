export type ApiType = {};
export type LaravelPagination<T> = {
    current_page: number;
    per_page: number;
    last_page: number;
    data: T[];
};
