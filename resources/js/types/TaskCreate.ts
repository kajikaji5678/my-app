export type Category = {
  id: number;
  category_name: string;
}

export type Type = {
  id: number;
  type_name: string;
}

export type Status = {
  id: number;
  status_name: string;
}

export type TaskFormResponse = {
  categories: Category[];
  types: Type[];
  statuses: Status[];
}