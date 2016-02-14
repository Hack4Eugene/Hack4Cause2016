var React = require('react-native');
var Success = require('./Success');


var {
    TouchableHighlight,
    Text,
    StyleSheet,
    View
} = React;

class Failure extends React.Component{
    handleSubmit(event){
      var report = this.props.report;

      this.setState({
        report: report
      });
      var apiReq = api.postReport(this.state.report);
      apiReq
        .then((response)=>response.text())
        .then((responseText)=>{
            console.log(responseText);
            this.props.navigator.push({
            title: 'Success',
            component: Success,
            passProps: {report: this.state.report}
      });
        })
        .catch((error) => {
            console.warn(error);
        });
      this.setState({
        report: ''
      });
    }
    render(){
        var layout = (
        <View style={styles.container}>
          <View style={styles.failureContainer}>
            <View style={styles.failureHeader}>
              <Text style={styles.failureType}>
                Unable{'\n'}to{'\n'}Contact{'\n'}Server
              </Text>
            </View>
            <TouchableHighlight
              underlayColor={'#B1B8B9'}
              style={styles.failureButton}
              value={true}
              onPress={this.handleSubmit.bind(this)}>
              <Text style={styles.issueType}>
                File Another Report
              </Text>
            </TouchableHighlight>
          </View>
        </View>
        );
        return layout;
    }
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    paddingTop: 120,
  },
  failureContainer: {
    flex: 1,
    flexDirection: 'row',
    flexWrap: 'wrap',
    justifyContent: 'center',
    alignItems: 'center',
    paddingLeft: 24,
    paddingRight: 24
  },
  failureHeader: {
    paddingBottom: 50,
    alignItems: 'center'
  },
  failureType: {
    fontSize: 48,
    textAlign: 'center'
  },
  failureButton: {
    width: 320,
    height: 100,
    justifyContent: 'center',
    backgroundColor: '#f62745',
    padding: 16,
    borderWidth: 1,
    borderColor: '#ffffff',
    marginBottom: 48,
  },
  issueType: {
    color: '#ffffff',
    textAlign: 'center',
    fontSize: 24,
    fontWeight: 'bold'
  },
});


module.exports = Failure;