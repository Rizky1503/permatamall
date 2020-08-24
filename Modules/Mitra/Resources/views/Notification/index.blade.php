@extends('mitra::layouts.master')

@section('content')
@include('mitra::include.menu_home')
<div class="row"> 
    <div class="col-md-12" style="min-height: 200px;">
    	<div class="panel panel-default">
		  <div class="panel-body" style="padding: 8px;">			
			<div id="root"></div>
		  </div>
		</div>		
    </div>    
</div>
@stop
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react-dom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.21.1/babel.min.js"></script>
<script type="text/babel">
class Greeting extends React.Component {
	constructor() {
	    super();
	    this.state = {
	      todos: ['a','b','c','d','e','f','g','h','i','j','k'],
	      currentPage: 1,
	      todosPerPage: 3
	    };
	    this.handleClick = this.handleClick.bind(this);
	}

	handleClick(event) {
	    this.setState({
	      currentPage: Number(event.target.id)
	    });
	}

	    
    
    render() {
        const { todos, currentPage, todosPerPage } = this.state;

    // Logic for displaying todos
    const indexOfLastTodo = currentPage * todosPerPage;
    const indexOfFirstTodo = indexOfLastTodo - todosPerPage;
    const currentTodos = todos.slice(indexOfFirstTodo, indexOfLastTodo);

    const renderTodos = currentTodos.map((todo, index) => {
      return <li key={index}>{todo}</li>;
    });

    // Logic for displaying page numbers
    const pageNumbers = [];
    for (let i = 1; i <= Math.ceil(todos.length / todosPerPage); i++) {
      pageNumbers.push(i);
    }

    const renderPageNumbers = pageNumbers.map(number => {
      return (
        <li
          key={number}
          id={number}
          onClick={this.handleClick}
        >
          {number}
        </li>
      );
    });

    return (
      <div>
        <ul>
          {renderTodos}
        </ul>
        <ul id="page-numbers">
          {renderPageNumbers}
        </ul>
      </div>
    );
    }
}
ReactDOM.render(
    <Greeting />,
    document.getElementById('root')
);
</script>
@endsection
